<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\DomainRecordRequest;
use App\Models\DomainRecord;
use Illuminate\Http\Request;

class DomainController extends Controller
{
    private function owned(int $id): DomainRecord
    {
        return auth()->user()->domainRecords()->findOrFail($id);
    }

    public function index(Request $request)
    {
        $query = auth()->user()->domainRecords();
        $rawSearch = $request->query('q');
        if ($search = (is_string($rawSearch) ? trim($rawSearch) : '')) {
            $query->where(function ($builder) use ($search) {
                $builder->where('domain_name', 'like', "%{$search}%")
                    ->orWhere('domain_extension', 'like', "%{$search}%")
                    ->orWhere('registrar', 'like', "%{$search}%");

                $separator = strpos($search, '.');
                if ($separator !== false) {
                    $name = substr($search, 0, $separator);
                    $extension = substr($search, $separator);
                    if ($name !== '' && $extension !== '') {
                        $builder->orWhere(fn ($domain) => $domain
                            ->where('domain_name', 'like', "%{$name}%")
                            ->where('domain_extension', 'like', "%{$extension}%"));
                    }
                }
            });
        }
        $status = $request->query('status');
        if (is_string($status) && in_array($status, ['active', 'pending', 'inactive'], true)) $query->where('status', $status);
        $registrar = $request->query('registrar');
        if (is_string($registrar) && $registrar !== '') $query->where('registrar', $registrar);
        $expiry = $request->query('expiry');
        if ($expiry === 'expired') $query->whereDate('expiry_date', '<', today());
        if ($expiry === 'soon') $query->where('status', 'active')->whereBetween('expiry_date', [today(), today()->addDays(30)]);
        if ($expiry === 'upcoming') $query->whereDate('expiry_date', '>', today()->addDays(30));
        $sorts = ['name' => 'domain_name', 'created' => 'created_at', 'expiry' => 'expiry_date'];
        $requestedSort = $request->query('sort', 'created');
        $sortKey = is_string($requestedSort) && array_key_exists($requestedSort, $sorts) ? $requestedSort : 'created';
        $sort = $sorts[$sortKey];
        $defaultDirection = in_array($sortKey, ['name', 'expiry'], true) ? 'asc' : 'desc';
        $requestedDirection = $request->query('direction');
        $direction = is_string($requestedDirection) && in_array($requestedDirection, ['asc', 'desc'], true) ? $requestedDirection : $defaultDirection;
        $hasFilters = collect($request->only(['q', 'status', 'registrar', 'expiry']))
            ->contains(fn ($value) => is_string($value) && trim($value) !== '');

        return view('user.domains.index', [
            'records' => $query->orderBy($sort, $direction)->paginate(10)->withQueryString(),
            'registrars' => auth()->user()->domainRecords()->select('registrar')->distinct()->orderBy('registrar')->pluck('registrar'),
            'direction' => $direction,
            'hasFilters' => $hasFilters,
        ]);
    }

    public function create()
    {
        return view('user.domains.create', ['record' => new DomainRecord()]);
    }

    public function store(DomainRecordRequest $request)
    {
        auth()->user()->domainRecords()->create($request->validated());

        return redirect()->route('user.domains.index')->with('success', 'Domain record added to your collection.');
    }

    public function show(int $domain)
    {
        $record = $this->owned($domain);
        $this->authorize('view', $record);

        return view('user.domains.show', compact('record'));
    }

    public function edit(int $domain)
    {
        $record = $this->owned($domain);
        $this->authorize('update', $record);

        return view('user.domains.edit', compact('record'));
    }

    public function update(DomainRecordRequest $request, int $domain)
    {
        $record = $this->owned($domain);
        $this->authorize('update', $record);
        $record->update($request->validated());

        return redirect()->route('user.domains.show', $record)->with('success', 'Your domain record was updated.');
    }

    public function destroy(int $domain)
    {
        $record = $this->owned($domain);
        $this->authorize('delete', $record);
        $record->delete();

        return redirect()->route('user.domains.index')->with('success', 'Domain record removed.');
    }
}
