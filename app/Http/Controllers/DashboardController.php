<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //

    public function getdash()
    {
        return view('layout.header');
    }
}
