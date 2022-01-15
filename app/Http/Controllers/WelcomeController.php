<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class WelcomeController extends Controller
{
    /**
     * Show welcome homepage
     *
     * @return View
     */
    public function index(): View
    {
        return view('welcome');
    }
}
