<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class PortfolioController extends Controller
{
    public function index()
    {
        return view('web.portfolio.index');
    }
}
