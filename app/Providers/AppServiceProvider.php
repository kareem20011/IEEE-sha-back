<?php

namespace App\Providers;

use App\Models\About;
use App\Models\Board;
use App\Models\Event;
use App\Models\Setting;
use App\Models\User;
use App\Models\Workshop;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $setting = Setting::getSetting();
        $about = About::getAbout();
        $boards = Board::with('category')->where('status', 1)->get();
        $recentEvents = Event::where('status', 1)->orderBy('expiry_date', 'desc')->limit(3)->get();
        $recentWorkshops = Workshop::with('category')->where('status', 1)->orderBy('created_at', 'desc')->limit(3)->get();

        view()->share([
            'setting' => $setting,
            'about' => $about,
            'boards' => $boards,
            'recentEvents' => $recentEvents,
            'recentWorkshops' => $recentWorkshops,
        ]);
    }
}
