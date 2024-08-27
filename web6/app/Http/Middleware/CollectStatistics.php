<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Statistic;
use Jenssegers\Agent\Agent;

class CollectStatistics
{
    public function handle(Request $request, Closure $next)
    {
        // Инициализация объекта Agent для получения информации о браузере
        $agent = new Agent();
        $browser = $agent->browser();
        $hostName = gethostbyaddr($request->ip()) ?: 'Unknown';

        // Попытка создания записи в базе данных
        Statistic::create([
            'page' => $request->fullUrl(),
            'ip' => $request->ip(),
            'host_name' => $hostName,
            'browser_name' => $browser,
        ]);

        // Продолжение выполнения запроса
        return $next($request);
    }
}
