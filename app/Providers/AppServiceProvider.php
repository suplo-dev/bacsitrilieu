<?php

namespace App\Providers;

use App\Enums\SystemConfigKeyEnum;
use App\Models\Category;
use App\Models\SystemConfig;
use Illuminate\Support\ServiceProvider;
use Inertia\Inertia;

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
        Inertia::share([
            'flash' => function () {
                return [
                    'success' => session('success'),
                    'error' => session('error'),
                ];
            },
            'categories' => function () {
                $categories = [];
                foreach (SystemConfigKeyEnum::getHomeCategory() as $key) {
                    $categories[$key] = Category::query()->with(['children', 'children.children'])->where('id', SystemConfig::getConfigByKey($key))->first();
                }
                return $categories;
            }]);
    }
}
