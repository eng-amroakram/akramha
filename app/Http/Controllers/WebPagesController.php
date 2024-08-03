<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebPagesController extends Controller
{
    public function landing()
    {
        return view('pages.web.landing');
    }
}
