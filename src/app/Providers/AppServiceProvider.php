<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(\App\Contracts\GetPrefecturesIntaface::class, function () {
            // return new \App\Mock\GetPrefecturesUseCase;
            return new \App\UseCase\GetPrefecturesUseCase;
        });

        $this->app->bind(\App\Prefecture::class, function ($app) {
            // モック切り替えスイッチ
            $isMock = true;

            if ($isMock == true) {
                // mockery
                $items = [];
                for ($i = 1; $i <= 47; $i++) {
                    $item = new \stdClass();
                    $item->id = $i;
                    $item->name = 'mock_db'. $i;
                    $items[] = $item;
                }
                $mock_data = \Illuminate\Support\Collection::make($items);
                $prefectures = \Mockery::mock('App\Prefecture');
                // all()メソッドを実行すると$mock_dataを返却するようなCollectionオブジェクトのモックを定義
                $prefectures->shouldReceive('all')->andReturn($mock_data);
            } else {
                // real
            }

            return $prefectures;
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
