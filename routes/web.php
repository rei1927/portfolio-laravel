<?php

use Illuminate\Support\Facades\Route;
use App\Models\Setting;
use App\Models\Experience;
use App\Models\Certification;
use App\Models\PortfolioItem;
use App\Models\Skill;

Route::get('/', function () {
    $setting = Setting::first();
    $experiences = Experience::orderBy('order')->get();
    $certifications = Certification::orderBy('order')->get();
    $skills = Skill::orderBy('order')->get();

    return view('home', compact('setting', 'experiences', 'certifications', 'skills'));
});

Route::get('/portfolio', function () {
    $setting = Setting::first();
    $portfolioItems = PortfolioItem::orderBy('order')->get();

    return view('portfolio', compact('setting', 'portfolioItems'));
});
