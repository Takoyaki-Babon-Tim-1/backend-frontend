<?php

namespace App\Providers;

use App\Models\AddToCart;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;

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
        View::composer('*', function ($view) {
            if (Auth::check()) {
                $cartItemCount = AddToCart::where('user_id', Auth::id())->sum('quantity');
                $view->with('cartItemCount', $cartItemCount);
            } else {
                $view->with('cartItemCount', 0);
            }
        });

         // Customisasi email verifikasi
         VerifyEmail::toMailUsing(function (object $notifiable, string $url) {
            return (new MailMessage)
                ->subject('Verify Your Email Address') // Subject kustom
                ->greeting('Hello, ' . $notifiable->name . '!') // Greeting personal
                ->line('Thank you for registering with us!') // Pesan pembuka
                ->line('Please click the button below to verify your email address and complete your registration.') // Informasi tambahan
                ->action('Verify Email Address', $url) // Tombol aksi
                ->line('If you did not create an account, no further action is required.') // Pesan penutup
                ->salutation('Best regards, Takoyaki Babon Team'); // Salam akhir
        });
    }
}
