<?php

namespace App\Http\Controllers;

use App\Models\Link;
use Illuminate\Http\Request;

class LinkController extends Controller
{
    public function redirect(string $ulid, Request $request)
    {
        $link = Link::where('redirect_ulid', $ulid)->firstOrFail();
        $link->transitions()->create([
            'ip_address' => $request->ip(),
        ]);

        return redirect()->away($link->original_url);
    }
}
