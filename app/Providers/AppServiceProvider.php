<?php

namespace App\Providers;

use App\Models\About;
use App\Models\Setting;
use App\Models\User;
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

        view()->share([
            'setting' => $setting,
            'about' => $about,
        ]);
    }
}
