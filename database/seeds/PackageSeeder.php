<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class PackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      \DB::table('packages')->insert(array(

        'name' => 'Laravel Collective',
        'composer' => '"laravelcollective/html": "5.1.*"',
        'dev' => '0',
        'providers' => 'Collective\Html\HtmlServiceProvider::class,',
        'aliases' => "'Form' => Collective\\Html\\FormFacade::class,
          'Html' => Collective\\Html\\HtmlFacade::class,",
        'publish' => '',
        'description' => 'We maintain Laravel components that have been removed from the core framework, so you can continue to use the amazing Laravel features that you love.',
    ));

        \DB::table('packages')->insert(array(

            'name' => 'Laravel Debugbar',
            'composer' => '"barryvdh/laravel-debugbar": "^2.0@dev"',
            'dev' => '1',
            'providers' => 'Barryvdh\Debugbar\ServiceProvider::class,',
            'aliases' => "'Debugbar'  => 'Barryvdh\\Debugbar\\Facade',",
            'publish' => 'php artisan vendor:publish',
            'description' => 'This is a package to integrate PHP Debug Bar with Laravel 5.',
        ));

        \DB::table('packages')->insert(array(

            'name' => 'Styde Blade Pagination',
            'composer' => '"styde/blade-pagination": "5.1.*@dev"',
            'dev' => '1',
            'providers' => 'Styde\BladePagination\ServiceProvider::class',
            'aliases' => "",
            'publish' => '',
            'description' => 'StydeNet Blade Pagination.',
        ));
    }

}
