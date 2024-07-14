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

        $uniqueVisits = $this->analyticsService->getUniqueVisitsPerDay($startDate, $endDate);
        $topBrowsers = $this->analyticsService->getTopBrowsers($startDate, $endDate);
        $topLocations = $this->analyticsService->getTopLocations($startDate, $endDate);

        return view('admin.analytics.index', compact('uniqueVisits', 'topBrowsers', 'topLocations'));
    }
}
