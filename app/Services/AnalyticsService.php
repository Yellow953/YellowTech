<?php
namespace App\Services;

use App\Models\Tracking;
use Illuminate\Http\Request;
use Stevebauman\Location\Facades\Location;

class AnalyticsService
{
    public function trackVisit(Request $request)
    {
        $ip = $request->ip();
        $userAgent = $request->userAgent();
        $url = $request->fullUrl();

        // Get location data
        $location = Location::get($ip);

        Tracking::create([
            'url' => $url,
            'ip_address' => $ip,
            'user_agent' => $userAgent,
            'country' => $location ? $location->countryName : null,
            'city' => $location ? $location->cityName : null,
            'visited_at' => now(),
        ]);
    }

    public function getUniqueVisitsPerDay($startDate, $endDate)
    {
        return Tracking::selectRaw('visited_at, COUNT(DISTINCT ip_address) as unique_visits')
            ->whereBetween('visited_at', [$startDate, $endDate])
            ->groupBy('visited_at')
            ->get();
    }

    public function getTopBrowsers($startDate, $endDate, $limit = 5)
    {
        return Tracking::selectRaw('user_agent, COUNT(*) as visits')
            ->whereBetween('visited_at', [$startDate, $endDate])
            ->groupBy('user_agent')
            ->orderByDesc('visits')
            ->limit($limit)
            ->get();
    }

    public function getTopLocations($startDate, $endDate, $limit = 5)
    {
        return Tracking::selectRaw('country, COUNT(*) as visits')
            ->whereBetween('visited_at', [$startDate, $endDate])
            ->groupBy('country')
            ->orderByDesc('visits')
            ->limit($limit)
            ->get();
    }
}
