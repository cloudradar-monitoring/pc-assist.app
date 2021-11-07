<?php

namespace App\Actions;

use Illuminate\Support\Facades\Cache;

class PairingStorage
{
    private const SESSION_STORAGE_TTL = 600;

    public static function create(string $url): string
    {
        $code = self::randomString();
        $key = self::key($code);
        while (Cache::has($key)) {
            $code = self::randomString();
            $key = self::key($code);
        }
        // Store the URL in the cache
        Cache::put($key, $url, self::SESSION_STORAGE_TTL);

        return $code;
    }

    public static function fetch(string $code): ?string
    {
        return Cache::get(self::key($code), function () {
            return null;
        });
    }

    public static function randomString($length = 6)
    {
        $chars = explode(' ', '1 2 3 4 5 6 7 8 9 a b c d e f g h i j k l m n p q r s t u v w x y z');
        $return = '';
        while (strlen($return) < $length) {
            $return .= $chars[rand(0, count($chars) - 1)];
        }

        return $return;
    }

    private static function key(string $code): string
    {
        return md5($code . env('APP_KEY'));
    }
}
