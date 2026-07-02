<?php

namespace App\Services;

use App\Models\Link;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class LinkService
{
    public static function redirect(string $ulid, Request $request): Link
    {
        /* @var $link Link */
        $link = Link::where('redirect_ulid', $ulid)->firstOrFail();
        $cacheKey = "click_lock:{$link->id}:" . $request->ip();
        // добавил кэш, чтобы два раза не записывались переходы
        if (Cache::add($cacheKey, true, now()->addSeconds(2))) {
            $link->transitions()->create([
                'ip_address' => $request->ip(),
            ]);
        }

        return $link;
    }
}
