<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DomainRecord;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function __invoke()
    {
        $today = today();
        $totalDomains = DomainRecord::count();
        $byStatus = DomainRecord::select('status', DB::raw('count(*) as total'))->groupBy('status')->pluck('total', 'status');
        $monthExpression = DB::connection()->getDriverName() === 'sqlite' ? "strftime('%Y-%m', created_at)" : "DATE_FORMAT(created_at, '%Y-%m')";
        $byMonth = DomainRecord::selectRaw("{$monthExpression} as month, COUNT(*) as total")
            ->where('created_at', '>=', now()->subMonths(5)->startOfMonth())
            ->groupBy('month')->orderBy('month')->get();
        $leaders = User::withCount('domainRecords')->orderByDesc('domain_records_count')->limit(5)->get();

        return view('admin.dashboard', [
            'stats' => [
                'users' => User::count(),
                'domains' => $totalDomains,
                'active' => DomainRecord::where('status', 'active')->whereDate('expiry_date', '>=', $today)->count(),
                'expired' => DomainRecord::whereDate('expiry_date', '<', $today)->count(),
                'pending' => DomainRecord::whereIn('status', ['pending', 'inactive'])->count(),
                'recent' => DomainRecord::where('created_at', '>=', now()->subDays(7))->count(),
            ],
            'recentRecords' => DomainRecord::with('user')->latest()->limit(6)->get(),
            'chartStatus' => [
                'labels' => ['Active', 'Pending', 'Inactive', 'Expired'],
                'values' => [DomainRecord::where('status', 'active')->whereDate('expiry_date', '>=', $today)->count(), (int) ($byStatus['pending'] ?? 0), (int) ($byStatus['inactive'] ?? 0), DomainRecord::whereDate('expiry_date', '<', $today)->count()],
            ],
            'chartMonths' => [
                'labels' => $byMonth->pluck('month')->map(fn ($month) => \Carbon\Carbon::createFromFormat('Y-m', $month)->format('M y'))->values(),
                'values' => $byMonth->pluck('total')->values(),
            ],
            'leaders' => $leaders,
        ]);
    }
}
