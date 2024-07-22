<?php

namespace App\Http\Controllers;

use App\Services\AnalyticsService;
use Illuminate\Http\Request;

class AnalyticsController extends Controller
{
    protected $analyticsService;

    public function __construct(AnalyticsService $analyticsService)
    {
        $this->analyticsService = $analyticsService;
        $this->middleware('admin');
    }

    public function index(Request $request)
{
    $startDate = $request->input('start_date', now()->subDays(30)->toDateString());
    $endDate = $request->input('end_date', now()->toDateString());

    $uniqueVisits = $this->analyticsService->getUniqueVisitsPerDay($startDate, $endDate)
        ->mapWithKeys(function ($item) {
            return [$item->visited_at->format('Y-m-d') => (int)$item->unique_visits];
        })
        ->toArray();

    $topBrowsers = $this->analyticsService->getTopBrowsers($startDate, $endDate)
        ->mapWithKeys(function ($item) {
            return [$item->user_agent => (int)$item->visits];
        })
        ->toArray();

    $topLocations = $this->analyticsService->getTopLocations($startDate, $endDate)
        ->mapWithKeys(function ($item) {
            return [$item->country ?: 'Unknown' => (int)$item->visits];
        })
        ->toArray();

    return view('admin.analytics.index', compact('uniqueVisits', 'topBrowsers', 'topLocations'));
}
    private function formatDate($date)
{
    // If $date is already a Carbon instance, format it
    if ($date instanceof \Carbon\Carbon) {
        return $date->format('Y-m-d');
    }

    // If $date is a string, parse it to a Carbon instance and then format it
    return \Carbon\Carbon::parse($date)->format('Y-m-d');
}
}
