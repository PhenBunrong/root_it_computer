<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Models\Setting;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        $setting = Setting::all('key', 'value')
            ->keyBy('key')
            ->transform(function ($setting){
                return $setting->value;
            })
            ->toArray();
        config([
            'settings' => $setting
        ]);

        config(['app.name' => config('settings.app_name')]);
    }
}
