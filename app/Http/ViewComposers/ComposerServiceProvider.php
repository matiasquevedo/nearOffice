<?php

namespace App\Http\ViewComposers;

use Illuminate\Support\ServiceProvider;
use App\Page;
use Harimayco\Menu\Models\Menus;
use Harimayco\Menu\Models\MenuItems;
use Harimayco\Menu\Facades\Menu;
// use Artisan;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function boot()
    {


        view()->composer('layouts.nav', function ($view) {
            //
            $pages = Page::where('state','1')->where('nav','1')->get();
            $principal = Menus::where('nav','1')->get()->first();
            // dd($principal);
            // dd($pages);
            if ($principal) {
                # code...
               $public_menu = Menu::getByName($principal->name);
            }else{
                $public_menu=null;
            }
            
            // dd($public_menu);
            // $routes = \Artisan::call('route:list');
            // dd($routes);
            $view->with("pages",$pages)->with("public_menu",$public_menu);
        });
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        //
    }

}