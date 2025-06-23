<?php

namespace App\Http\Controllers\Designer;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\WeatherService;

class DashboardController extends Controller
{
    public function index(WeatherService $weatherService)
    {
        $designer = auth()->user();

        $city = $designer->city ?? 'Delhi';
        $weather = $weatherService->getWeather($city);
        $weatherTip = optional($weatherService)->getDesignTip($weather['condition'] ?? null);

        $designer->loadCount('roomPacks');
        $designer->loadSum('timeLogs', 'hours');
        $designer->loadSum(['payments as total_paid' => function ($q) {
            $q->where('status', 'paid');
        }], 'amount');

        $revisionCount = $designer->roomPacks()
            ->withCount('revisions')
            ->get()
            ->sum('revisions_count');

        return view('designer.dashboard', [
            'roomCount' => $designer->room_packs_count,
            'hoursWorked' => $designer->time_logs_sum_hours,
            'revisions' => $revisionCount,
            'payments' => $designer->total_paid,
            'weather' => $weather,
            'weatherTip' => $weatherTip,
        ]);
    }
}
