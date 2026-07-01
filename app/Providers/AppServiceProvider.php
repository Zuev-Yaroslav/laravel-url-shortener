<?php

namespace App\Providers;

use Filament\Tables\Columns\TextColumn;
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
        TextColumn::macro('asMskDateTime', function () {
            /** @var TextColumn $this */
            return $this
                ->dateTime('d.m.Y H:i:s')
                ->timezone('Europe/Moscow');
        });
    }
}
