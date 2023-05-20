<?php

namespace App\Http\View\Composers;

use App\Model\Admin\ActivityCategory;
use App\Model\Admin\Banner;
use App\Model\Admin\Category;
use Illuminate\View\View;

class MenuHomePageComposer
{
    /**
     * Compose Settings Menu
     * @param View $view
     */
    public function compose(View $view)
    {
        $productCategories = Category::query()->with([
            'childs' => function ($q) {
                $q->where('level', 1);
            },
            'manufacturers'])
            ->where(['type' => 1, 'parent_id' => 0, 'show_home_page' => 1])
            ->latest()
            ->get();

        $activityCategories = ActivityCategory::query()->with([
            'childs' => function ($q) {
                $q->where('level', 1);
            }])->where(['type' => 1, 'parent_id' => 0])->latest()->get();

        $bannerTop = Banner::query()->where(['position' => 'top'])->latest()->first();

        $view->with(['productCategories' => $productCategories, 'activityCategories' => $activityCategories, 'bannerTop' => $bannerTop]);
    }
}
