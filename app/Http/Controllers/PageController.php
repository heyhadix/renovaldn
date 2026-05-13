<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use Illuminate\View\View;

class PageController extends Controller
{
    public function home(): View
    {
        return view('home');
    }

    public function services(): View
    {
        return view('services');
    }

    public function contact(): View
    {
        return view('contact', ['services' => Lead::$services]);
    }
}
