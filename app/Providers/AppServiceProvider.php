<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Menu\Menu;
use View;
use Illuminate\Support\Facades\Cache;

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
        View::composer(['layouts.navbar'],function ($view){   
                // if( Cache::has('menus')) {
                //     $menus = Cache::get('menus');
                // }else{
                    $menus=Menu::with(['subMenu', 'activeSubMenu'])
                            ->where(['menu_for'=>Menu::ADMIN_MENU,'status'=>Menu::ACTIVE])
                            ->orderBy('serial_num','ASC')
                            ->get();

                    //Cache::put('menus',$menus,'60');
                    // $menus = Cache::get('menus');
                // }
                $view->with(['menus'=>$menus]);
            });
    }
}
