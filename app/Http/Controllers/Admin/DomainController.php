<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\DomainRecordRequest;
use App\Models\DomainRecord;
use App\Models\User;
use Illuminate\Http\Request;

class DomainController extends Controller
{
    public function index(Request $request)
    {
        $query = DomainRecord::with('user');
        if ($search = trim((string) $request->query('q'))) {
            $query->where(function ($builder) use ($search) {
                $builder->where('domain_name', 'like', "%{$search}%")
                    ->orWhere('domain_extension', 'like', "%{$search}%")
                    ->orWhere('registrar', 'like', "%{$search}%")
                    ->orWhereHas('user', fn ($owner) => $owner->where('name', 'like', "%{$search}%")->orWhere('email', 'like', "%{$search}%"));
            });
        }
        if ($request->filled('user_id')) $query->where('user_id', $request->integer('user_id'));
        if (in_array($request->query('status'), ['active', 'pending', 'inactive'], true)) $query->where('status', $request->query('status'));
        if ($registrar = $request->query('registrar')) $query->where('registrar', $registrar);
        $this->applyExpiryFilter($query, $request->query('expiry'));
        $sorts = ['name' => 'domain_name', 'created' => 'created_at', 'expiry' => 'expiry_date'];
        $sort = $sorts[$request->query('sort')] ?? 'created_at';
        $query->orderBy($sort, $request->query('direction') === 'asc' ? 'asc' : 'desc');

        return view('admin.domains.index', [
            'records' => $query->paginate(12)->withQueryString(),
            'users' => User::orderBy('name')->get(['id', 'name', 'email']),
            'registrars' => DomainRecord::query()->select('registrar')->distinct()->orderBy('registrar')->pluck('registrar'),
        ]);
    }

    private function applyExpiryFilter($query, ?string $period): void
    {
        if ($period === 'expired') $query->whereDate('expiry_date', '<', today());
        if ($period === 'soon') $query->whereBetween('expiry_date', [today(), today()->addDays(30)]);
        if ($period === 'upcoming') $query->whereDate('expiry_date', '>', today()->addDays(30));
    }

    public function create()
    {
        return view('admin.domains.create', ['record' => new DomainRecord(), 'users' => User::where('is_active', true)->orderBy('name')->get()]);
    }

    public function store(DomainRecordRequest $request)
    {
        $owner = $request->validate(['user_id' => ['required', 'exists:users,id']]);
        DomainRecord::create($request->validated() + ['user_id' => $owner['user_id']]);

        return redirect()->route('admin.domains.index')->with('success', 'Domain record added.');
    }

    public function show(DomainRecord $domain)
    {
        return view('admin.domains.show', ['record' => $domain->load('user')]);
    }

    public function edit(DomainRecord $domain)
    {
        return view('admin.domains.edit', ['domain' => $domain, 'users' => User::orderBy('name')->get()]);
    }

    public function update(DomainRecordRequest $request, DomainRecord $domain)
    {
        $owner = $request->validate(['user_id' => ['required', 'exists:users,id']]);
        $domain->update($request->validated() + ['user_id' => $owner['user_id']]);

        return redirect()->route('admin.domains.show', $domain)->with('success', 'Domain record updated.');
    }

    public function destroy(DomainRecord $domain)
    {
        $domain->delete();

        return redirect()->route('admin.domains.index')->with('success', 'Domain record deleted.');
    }
}
