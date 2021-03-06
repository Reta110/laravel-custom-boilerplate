<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePackageRequest;
use App\Package;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Storage;
use Illuminate\Support\Facades\Input;

class GeneratorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() 
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePackageRequest $request)
    {
        $package = new Package();

        $package->name = $request->name;
        $package->composer = $request->composer;

        if($request->dev =! 1)
        $package->dev = 0;

        $package->providers = $request->providers;
        $package->aliases = $request->aliases;
        $package->publish = $request->publish;
        $package->description = $request->description;
        $package->description = $request->url;

        $package->save();

        return redirect()->action('WebController@home');
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function show(Request $request)
    {

        //Composer lines in variables
        $requireVar='';
        $requireDevVar='';
        $providers='';
        $aliases='';
        $publish='';

        /*$version = Input::get('version');

        if($version = '5.1')
        $version = '"laravel/framework": "5.1.*"\'';*/

    //for each input
    foreach(Input::all() as $key => $value){
        if($key != '_token' && $key != 'version'){

            $result = \DB::table('packages')
                ->where('id','=',$key)
                ->first();

             if($result->dev == 0){
                $requireVar = $requireVar.',
                '.$result->composer;
             }else{

                $requireDevVar = $requireDevVar.',
                '.$result->composer;
             }

              //Providers
              if(isset($result->providers))
              $providers = $providers.'
                '.$result->providers;

              //Aliases
              if(isset($result->aliases))
              $aliases = $aliases.$result->aliases;

              //Publish
              if(isset($result->publish))
              $publish = $publish.'
              '.$result->publish;
        }
    }//End foreach

        //Perfect indentation for the lines
        $requireVar = $this->indentationByComma($requireVar);
        $requireDevVar = $this->indentationByComma($requireDevVar);
        $providers = $this->indentation($providers);
        $aliases = $this->indentation($aliases);

        list($content, $configApp) = $this->generate51($requireVar, $requireDevVar, $providers, $aliases);

        //The files are saved in a foder  day/time/files.php
        $day = date('d-m-y');
        $folder = time();

        Storage::put($day.'/'.$folder.'/composer.json',$content);
        Storage::put($day.'/'.$folder.'/config.php',$configApp);

        //Return to show in the view
        $variables = array(
            'content' => $content,
            'configApp' => $configApp,
            'configApp' => $configApp,
            'publish' => $publish,
            'folder' => $folder
        );

    return redirect('/home')->with($variables);
}


    /**
     * @param $requireVar
     * @param $requireDevVar
     * @param $providers
     * @param $aliases
     * @return array
     */
    public function generate51($requireVar, $requireDevVar, $providers, $aliases)
    {
    //Estructure of the file
        $content = '{
    "name": "laravel/laravel",
    "description": "The Laravel Framework.",
    "keywords": ["framework", "laravel"],
    "license": "MIT",
    "type": "project",
    "require": {
        "php": ">=5.5.9",
        "laravel/framework": "5.1.*"';

        $content = $content . $requireVar . '
    },
    "require-dev": {
        "fzaninotto/faker": "~1.4",
        "mockery/mockery": "0.9.*",
        "phpunit/phpunit": "~4.0"';

        $content = $content . $requireDevVar . '
    },
    "autoload": {
        "classmap": [
            "database"
        ],
        "psr-4": {
            "App\\\": "app/"
        }
    },
    "autoload-dev": {
        "classmap": [
            "tests/TestCase.php"
        ]
    },
    "scripts": {
        "post-install-cmd": [
            "php artisan clear-compiled",
            "php artisan optimize"
        ],
        "pre-update-cmd": [
            "php artisan clear-compiled"
        ],
        "post-update-cmd": [
            "php artisan optimize"
        ],
        "post-root-package-install": [
            "php -r \"copy(\'.env.example\', \'.env\');\""
        ],
        "post-create-project-cmd": [
            "php artisan key:generate"
        ]
    },
    "config": {
        "preferred-install": "dist"
    }
}
';

        $configApp = "<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Application Debug Mode
    |--------------------------------------------------------------------------
    |
    | When your application is in debug mode, detailed error messages with
    | stack traces will be shown on every error that occurs within your
    | application. If disabled, a simple generic error page is shown.
    |
    */

    'debug' => env('APP_DEBUG', false),

    /*
    |--------------------------------------------------------------------------
    | Application URL
    |--------------------------------------------------------------------------
    |
    | This URL is used by the console to properly generate URLs when using
    | the Artisan command line tool. You should set this to the root of
    | your application so that it is used when running Artisan tasks.
    |
    */

    'url' => 'http://localhost',

    /*
    |--------------------------------------------------------------------------
    | Application Timezone
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default timezone for your application, which
    | will be used by the PHP date and date-time functions. We have gone
    | ahead and set this to a sensible default for you out of the box.
    |
    */

    'timezone' => 'UTC',

    /*
    |--------------------------------------------------------------------------
    | Application Locale Configuration
    |--------------------------------------------------------------------------
    |
    | The application locale determines the default locale that will be used
    | by the translation service provider. You are free to set this value
    | to any of the locales which will be supported by the application.
    |
    */

    'locale' => 'en',

    /*
    |--------------------------------------------------------------------------
    | Application Fallback Locale
    |--------------------------------------------------------------------------
    |
    | The fallback locale determines the locale to use when the current one
    | is not available. You may change the value to correspond to any of
    | the language folders that are provided through your application.
    |
    */

    'fallback_locale' => 'en',

    /*
    |--------------------------------------------------------------------------
    | Encryption Key
    |--------------------------------------------------------------------------
    |
    | This key is used by the Illuminate encrypter service and should be set
    | to a random, 32 character string, otherwise these encrypted strings
    | will not be safe. Please do this before deploying an application!
    |
    */

    'key' => env('APP_KEY', 'SomeRandomString'),

    'cipher' => 'AES-256-CBC',

    /*
    |--------------------------------------------------------------------------
    | Logging Configuration
    |--------------------------------------------------------------------------
    |
    | Here you may configure the log settings for your application. Out of
    | the box, Laravel uses the Monolog PHP logging library. This gives
    | you a variety of powerful log handlers / formatters to utilize.
    |
    | Available Settings: 'single', 'daily', 'syslog', 'errorlog'
    |
    */

    'log' => 'single',

    /*
    |--------------------------------------------------------------------------
    | Autoloaded Service Providers
    |--------------------------------------------------------------------------
    |
    | The service providers listed here will be automatically loaded on the
    | request to your application. Feel free to add your own services to
    | this array to grant expanded functionality to your applications.
    |
    */

    'providers' => [

        /*
         * Laravel Framework Service Providers...
         */
        Illuminate\\Foundation\\Providers\\ArtisanServiceProvider::class,
        Illuminate\\Auth\\AuthServiceProvider::class,
        Illuminate\\Broadcasting\\BroadcastServiceProvider::class,
        Illuminate\\Bus\\BusServiceProvider::class,
        Illuminate\\Cache\\CacheServiceProvider::class,
        Illuminate\\Foundation\\Providers\\ConsoleSupportServiceProvider::class,
        Illuminate\\Routing\\ControllerServiceProvider::class,
        Illuminate\\Cookie\\CookieServiceProvider::class,
        Illuminate\\Database\\DatabaseServiceProvider::class,
        Illuminate\\Encryption\\EncryptionServiceProvider::class,
        Illuminate\\Filesystem\\FilesystemServiceProvider::class,
        Illuminate\\Foundation\\Providers\\FoundationServiceProvider::class,
        Illuminate\\Hashing\\HashServiceProvider::class,
        Illuminate\\Mail\\MailServiceProvider::class,
        Illuminate\\Pagination\\PaginationServiceProvider::class,
        Illuminate\\Pipeline\\PipelineServiceProvider::class,
        Illuminate\\Queue\\QueueServiceProvider::class,
        Illuminate\\Redis\\RedisServiceProvider::class,
        Illuminate\\Auth\\Passwords\\PasswordResetServiceProvider::class,
        Illuminate\\Session\\SessionServiceProvider::class,
        Illuminate\\Translation\\TranslationServiceProvider::class,
        Illuminate\\Validation\\ValidationServiceProvider::class,
        Illuminate\\View\\ViewServiceProvider::class,

        /*
         * Application Service Providers...
         */
        App\\Providers\\AppServiceProvider::class,
        App\\Providers\\AuthServiceProvider::class,
        App\\Providers\\EventServiceProvider::class,
        App\\Providers\\RouteServiceProvider::class,

        ";

        $configApp = $configApp.$providers."

    ],

    /*
    |--------------------------------------------------------------------------
    | Class Aliases
    |--------------------------------------------------------------------------
    |
    | This array of class aliases will be registered when this application
    | is started. However, feel free to register as many as you wish as
    | the aliases are 'lazy' loaded so they don't hinder performance.
    |
    */

    'aliases' => [

        'App'       => Illuminate\\Support\\Facades\\App::class,
        'Artisan'   => Illuminate\\Support\\Facades\\Artisan::class,
        'Auth'      => Illuminate\\Support\\Facades\\Auth::class,
        'Blade'     => Illuminate\\Support\\Facades\\Blade::class,
        'Bus'       => Illuminate\\Support\\Facades\\Bus::class,
        'Cache'     => Illuminate\\Support\\Facades\\Cache::class,
        'Config'    => Illuminate\\Support\\Facades\\Config::class,
        'Cookie'    => Illuminate\\Support\\Facades\\Cookie::class,
        'Crypt'     => Illuminate\\Support\\Facades\\Crypt::class,
        'DB'        => Illuminate\\Support\\Facades\\DB::class,
        'Eloquent'  => Illuminate\\Database\\Eloquent\\Model::class,
        'Event'     => Illuminate\\Support\\Facades\\Event::class,
        'File'      => Illuminate\\Support\\Facades\\File::class,
        'Gate'      => Illuminate\\Support\\Facades\\Gate::class,
        'Hash'      => Illuminate\\Support\\Facades\\Hash::class,
        'Input'     => Illuminate\\Support\\Facades\\Input::class,
        'Inspiring' => Illuminate\\Foundation\\Inspiring::class,
        'Lang'      => Illuminate\\Support\\Facades\\Lang::class,
        'Log'       => Illuminate\\Support\\Facades\\Log::class,
        'Mail'      => Illuminate\\Support\\Facades\\Mail::class,
        'Password'  => Illuminate\\Support\\Facades\\Password::class,
        'Queue'     => Illuminate\\Support\\Facades\\Queue::class,
        'Redirect'  => Illuminate\\Support\\Facades\\Redirect::class,
        'Redis'     => Illuminate\\Support\\Facades\\Redis::class,
        'Request'   => Illuminate\\Support\\Facades\\Request::class,
        'Response'  => Illuminate\\Support\\Facades\\Response::class,
        'Route'     => Illuminate\\Support\\Facades\\Route::class,
        'Schema'    => Illuminate\\Support\\Facades\\Schema::class,
        'Session'   => Illuminate\\Support\\Facades\\Session::class,
        'Storage'   => Illuminate\\Support\\Facades\\Storage::class,
        'URL'       => Illuminate\\Support\\Facades\\URL::class,
        'Validator' => Illuminate\\Support\\Facades\\Validator::class,
        'View'      => Illuminate\\Support\\Facades\\View::class,

        ";
        $configApp = $configApp.$aliases."


    ],

];
";
        return array($content, $configApp);
    }

    /**
     * @param $var
     * @return mixed
     */
    public function indentation($var)
    {
        if (isset($var)) {
            $var = str_replace(' ', '', $var);
            $var = preg_replace("[\n|\r|\n\r]", "", $var);
            $var = str_replace('=>', ' => ', $var);
            $var = str_replace('::class,', '::class,
        ', $var);
        }

        return $var;
    }

    public function indentationByComma($var)
    {
        if (isset($var)) {
            $var = str_replace(' ', '', $var);
            $var = preg_replace("[\n|\r|\n\r]", "", $var);
            $var = str_replace(':', ': ', $var);
            $var = str_replace(',', ',
        ', $var);
        }

        return $var;
    }
}
