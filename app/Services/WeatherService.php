<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class WeatherService
{
    public function getWeather($city = 'Delhi')
    {
        $apiKey = config('services.openweather.key');

        $response = Http::get("https://api.openweathermap.org/data/2.5/weather", [
            'q' => $city,
            'appid' => $apiKey,
            'units' => 'metric',
        ]);

        if ($response->successful()) {
            $data = $response->json();

        return [
            'temp' => $data['main']['temp'],
            'condition' => $data['weather'][0]['main'],
            'city' => $data['name'] ?? 'your city',
        ];

        }

        return null;
    }

    public function getDesignTip($condition)
    {
        return match (strtolower($condition)) {
            'rain' => 'Use moisture-resistant furniture and lighting.',
            'clear' => 'Maximize natural light with sheer curtains.',
            'clouds' => 'Warm-toned lights can help brighten the space.',
            default => 'Match your design with today’s mood!',
        };
    }
}
