<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class RateLimit
{
    private const WAIT_TIME_SEC = 5;

    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $cacheKey = md5($request->method() . $request->url() . $request->ip());
        if ($lastRequest = Cache::get($cacheKey)) {
            $nextRequest = $lastRequest + self::WAIT_TIME_SEC;
            Log::error(sprintf('%s is sending too fast', $request->ip()));

            return response()->json([
                'success'      => false,
                'message'      => sprintf('Rate Limit hit. Wait %d seconds between requests.', self::WAIT_TIME_SEC),
                'wait_seconds' => self::WAIT_TIME_SEC,
                'wait_until'   => [
                    'timestamp' => $nextRequest,
                    'date_time' => date('Y-m-d\TH:i:sO', $nextRequest),
                ],
            ], 429);
        }
        // Store the remote IP
        Cache::put($cacheKey, time(), self::WAIT_TIME_SEC);

        return $next($request);
    }
}
