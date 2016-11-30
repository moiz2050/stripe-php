<?php

namespace Moiz2050\Stripe;

use Illuminate\Support\ServiceProvider;
use Stripe\Stripe;
use Blade;

class StripeServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        Stripe::setApiKey(config('payment.stripe.secret'));

        Blade::extend(function ($view, $compiler) {
            $matcher = "/(?<!\w)(\s*)@stripeKey/";
            return preg_replace($matcher, config('services.stripe.key'), $view);
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
