<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

use App\Models\BackpackUser;
use App\Models\Pay;
use App\Models\Etat;
use App\Models\Ville;

use App\Observers\UserObserver;
use App\Observers\PayObserver;
use App\Observers\EtatObserver;
use App\Observers\VilleObserver;

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
        
        $this->bootObservers();
    }
    
    /**
     * Boot observers
     */
    public function bootObservers() {
        BackpackUser::observe(UserObserver::class);
        Etat::observe(EtatObserver::class);
        Pay::observe(PayObserver::class);
        Ville::observe(VilleObserver::class);
        
    }    
}
