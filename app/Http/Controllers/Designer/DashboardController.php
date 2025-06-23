<?php

namespace App\Http\Controllers\Designer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RoomPack;
use App\Models\TimeLog;
use App\Models\Revision;
use App\Models\Payment;
use App\Services\WeatherService;

class DashboardController extends Controller
{
public function index(WeatherService $weatherService)
{
    $designerId = auth()->id();

    $weather = $weatherService->getWeather('Delhi');
    $weatherTip = $weather ? $weatherService->getDesignTip($weather['condition']) : null;

    return view('designer.dashboard', [
        'roomCount' => RoomPack::where('designer_id', $designerId)->count(),
        'hoursWorked' => TimeLog::where('designer_id', $designerId)->sum('hours'),
        'revisions' => Revision::whereHas('roomPack', function ($q) use ($designerId) {
            $q->where('designer_id', $designerId);
        })->count(),
        'payments' => Payment::where('designer_id', $designerId)->where('status', 'paid')->sum('amount'),
        'weather' => $weather,
        'weatherTip' => $weatherTip,
    ]);
}
}
