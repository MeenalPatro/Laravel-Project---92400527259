<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __invoke()
    {
        $user = Auth::user();
        $records = $user->domainRecords();

        return view('user.dashboard', [
            'stats' => [
                'total' => (clone $records)->count(),
                'active' => (clone $records)->where('status', 'active')->whereDate('expiry_date', '>=', today())->count(),
                'expired' => (clone $records)->whereDate('expiry_date', '<', today())->count(),
                'soon' => (clone $records)->where('status', 'active')->whereBetween('expiry_date', [today(), today()->addDays(30)])->count(),
            ],
            'recentRecords' => (clone $records)->latest()->limit(5)->get(),
        ]);
    }
}
