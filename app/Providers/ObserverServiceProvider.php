<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Post;
use App\Models\Product;
use App\Models\Topic;
use App\Models\User;
use App\Observers\GlobalObserver;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;

class ObserverServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        self::registerGlobalObserver();
    }

    public static function registerGlobalObserver(): void
    {
        /** @var Model[] $MODELS */
        $MODELS = [
            Category::class,
            Product::class,
            Topic::class,
            Post::class,
            User::class,
            Order::class,
            OrderDetail::class
        ];
        foreach ($MODELS as $MODEL) {
            $MODEL::observe(GlobalObserver::class);
        }
    }
}
