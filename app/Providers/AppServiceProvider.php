<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use TCG\Voyager\Models\Category;

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
        $cat_ids = \DB::table('posts')
            ->groupBy('category_id')
            ->orderBy(\DB::raw('count(category_id)'), 'DESC')
            ->take(5)
            ->pluck('category_id')->toArray();

        $ids_ordered = implode(',', $cat_ids);
        $headerItems = Category::whereIn('id', $cat_ids)
            ->orderByRaw("FIELD(id, $ids_ordered)")
            ->get();


        view()->composer('*', function ($view) use ($headerItems) {
            $view->with(
                'headerItems',
                $headerItems
            );
        });
    }
}
