<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class TestController extends Controller
{
    public function test(Request $request)
    {
        if (!App::isLocal()) {
            abort(403);
        }

        return view('test');
    }
}
