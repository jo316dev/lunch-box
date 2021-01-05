<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index()
    {
        $plans = Plan::with('details')->orderby('price', 'ASC')->get();

        return view('site.pages.home.index', compact('plans'));
    }

    public function plan($url)
    {
        $plan = Plan::where('url', $url)->first();

        session()->put('plan', $plan); //Armazena a sessão

        return redirect()->route('register');
    }
}
