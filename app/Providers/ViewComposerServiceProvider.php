<?php

namespace App\Providers;

use Cart;
use App\Models\Category;
use App\Models\CartItem;
use App\Models\Setting;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Auth;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('site.partials.nav', function ($view) {
            $view->with('categories', Category::orderByRaw('-name ASC')->get()->nest());
        });
        //  đếm giỏ hàng có bao nhiêu số lượng khi dùng session trên header
        View::composer('site.partials.header', function ($view) {
            $view->with('cartCount', Cart::getContent()->count());
        });
         //  đếm giỏ hàng có bao nhiêu số lượng khi dùng database trên header
        View::composer('site.partials.header', function ($view) {
            if (Auth::check() && Auth::user()->archives == 'database') {
                $id = Auth::user()->id;
                $view->with('cartCountDB', CartItem::select()->where('user_id', $id)->get()->count());
            } else {
                $view->with('cartCountDB', 0);
            }
        });
        //  đếm giỏ hàng có bao nhiêu số lượng khi dùng database trong giỏ hàng
        View::composer('site.pages.cart', function ($view) {
            if (Auth::check() && Auth::user()->archives == 'database') {
                $id = Auth::user()->id;
                $view->with('cartCountDB', CartItem::select()->where('user_id', $id)->get()->count());
            }
        });
         //  đếm giỏ hàng có bao nhiêu số lượng khi dùng session trong giỏ hàng
        View::composer('site.pages.cart', function ($view) {
            $view->with('Count', Cart::getContent()->count());
        });
          //  đếm giỏ hàng có bao nhiêu số lượng khi dùng database trong giỏ hàng
        View::composer('site.pages.cart', function ($view) {
            if (Auth::check() && Auth::user()->archives == 'database') {
                $id = Auth::user()->id;
                $view->with('Carts', CartItem::select()->where('user_id', $id)->get());
            }
        });
        // lấy ảnh logo từ trong bảng setting
        View::composer('site.partials.header', function ($view) {   
            $view->with('setting', Setting::select('value')->where('key','site_logo')->get());
        });
    }
}   
