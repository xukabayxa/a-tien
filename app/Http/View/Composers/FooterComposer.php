<?php

namespace App\Http\View\Composers;

use App\Model\Admin\Category;
use App\Model\Admin\Config;
use App\Model\Admin\Policy;
use App\Model\Admin\Store;
use Illuminate\View\View;

class FooterComposer
{
    /**
     * Compose Settings Menu
     * @param View $view
     */
    public function compose(View $view)
    {
//        $store_main = Store::query()->where('is_main', true)->first();
//
//        if($store_main) {
//            $stores = Store::query()->whereNotIn('id', [$store_main->id])->latest()->get();
//        } else {
//            $stores = Store::query()->latest()->get();
//        }
//
//        $config = Config::query()->get()->first();
//
//        $productCategories = Category::query()->where(['type' => 1, 'parent_id' => 0, 'show_home_page' => 1])
//            ->latest()
//            ->get();
//
//        $view->with(['stores' => $stores, 'config' => $config, 'store_main' => $store_main, 'productCategories' => $productCategories]);
    }
}
