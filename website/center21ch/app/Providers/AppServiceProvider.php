<?php

namespace App\Providers;
use App\Channel;
use App\Poet;
use App\Translate;
use App\poem;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        
        
        
        view()->composer('*', function($view) {
           // var_dump('querying');
           $channels = \Cache::remember('channels',0, function() {
               return Channel::all();
           });
          
           $translates = \Cache::remember('translates',0, function() {
            return Translate::select('language')->distinct()->get();
        });

        $languages = \Cache::remember('languages',0, function() {
            return Poem::select('language')->distinct()->get();
        });

       
           
            $view->with(['channels'=> $channels, 'translates'=> $translates , 'languages'=> $languages] );
        });
        
        \Validator::extend('spamfree', 'App\Rules\SpamFree@passes');
        
        
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if($this->app->isLocal()){
            $this->app->register(\Barryvdh\Debugbar\ServiceProvider::class);
        }
    }
}
