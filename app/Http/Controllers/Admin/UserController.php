<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $query = User::withCount('domainRecords');
        if ($search = trim((string) $request->query('q'))) {
            $query->where(fn ($builder) => $builder->where('name', 'like', "%{$search}%")->orWhere('email', 'like', "%{$search}%"));
        }

        return view('admin.users.index', ['users' => $query->orderBy('name')->paginate(12)->withQueryString()]);
    }

    public function show(User $user)
    {
        return view('admin.users.show', ['person' => $user->loadCount('domainRecords')->load(['domainRecords' => fn ($q) => $q->latest()->limit(5)])]);
    }

    public function edit(User $user)
    {
        return view('admin.users.edit', ['person' => $user]);
    }

    public function update(Request $request, User $user)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:120'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email,'.$user->id],
            'is_active' => ['required', 'boolean'],
        ]);
        if ($request->user()->is($user) && !$data['is_active']) {
            return back()->withErrors(['is_active' => 'You cannot deactivate your own active administrator account.'])->withInput();
        }
        $user->fill(['name' => $data['name'], 'email' => $data['email']]);
        $user->is_active = (bool) $data['is_active'];
        $user->save();

        return redirect()->route('admin.users.show', $user)->with('success', 'Account details updated.');
    }

    public function destroy(Request $request, User $user)
    {
        if ($request->user()->is($user)) {
            return back()->with('error', 'You cannot delete the administrator account you are currently using.');
        }
        if ($user->isAdmin() && User::where('role', 'admin')->where('is_active', true)->count() <= 1) {
            return back()->with('error', 'Keep at least one active administrator in the system.');
        }
        $user->delete();

        return redirect()->route('admin.users.index')->with('success', 'Account and its domain records were deleted.');
    }
}
