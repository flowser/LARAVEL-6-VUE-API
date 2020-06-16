<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WebController extends Controller
{
    public function superadmin()
    {
        // $organisation = Organisation::with('country', 'county', 'constituency', 'ward')
        //     ->first();
            //  return view('layouts/backendmaster', compact('organisation'));
             return view('layouts/backendmaster');
    }
    public function admin()
    {
        // $organisation = Organisation::with('country', 'county', 'constituency', 'ward')
        //     ->first();
            //  return view('layouts/backendmaster', compact('organisation'));
             return view('layouts/backendmaster');
    }

    public function client()
    {
        // $organisation = Organisation::with('country', 'county', 'constituency', 'ward')
        //     ->first();
            //  return view('layouts/frontendmaster', compact('organisation'));
             return view('layouts/frontendmaster');
    }

    public function guest()
    {
        // $organisation = Organisation::with('country', 'county', 'constituency', 'ward')
        //     ->first();
            //  return view('layouts/frontendmaster', compact('organisation'));
             return view('layouts/frontendmaster');
    }
}
