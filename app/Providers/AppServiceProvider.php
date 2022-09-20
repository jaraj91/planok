<?php

namespace App\Providers;

use Illuminate\Support\Str;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Stringable;

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
        Str::macro('rut', function($value) {
            $indice = Str::substr($value, -1, 1);
            $numero = Str::substr($value, 0, -1);
            $formattedRut = number_format($numero, 0, ',', '.') . '-' . $indice; 
            return Str::of($formattedRut);
        });

        Stringable::macro('rut', function() {
            return new Stringable(Str::rut($this->value));
        });
    }
}
