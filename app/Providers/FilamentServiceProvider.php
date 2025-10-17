<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Filament\Support\Colors\Color;
use Filament\Support\Facades\FilamentColor;

class FilamentServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // Customize Filament colors
        FilamentColor::register([
            'primary' => Color::Amber,
            'danger' => Color::Rose,
            'gray' => Color::Gray,
            'info' => Color::Blue,
            'success' => Color::Emerald,
            'warning' => Color::Orange,
        ]);
    }
}
