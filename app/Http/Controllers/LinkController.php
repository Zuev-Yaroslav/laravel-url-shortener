<?php

namespace App\Http\Controllers;

use App\Models\Link;
use App\Services\LinkService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class LinkController extends Controller
{
    public function redirect(string $ulid, Request $request)
    {
        $link = LinkService::redirect($ulid, $request);

        return redirect()->away($link->original_url);
    }
}
