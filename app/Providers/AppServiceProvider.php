<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Product;
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

        $members = Product::count();
       // View::share('currentmembers', $members);
       view()->share('count', $members);

    //    $members = DB::table('members')->get()->count();
    //    View::share('currentmembers', $members);
      // return $members;
      // view()->share('product',Product::first());
      
    }
}
