<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Response;

class ApiResponseServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // success
        Response::macro('success', function ($data = []) {
            return response()->json([
                'result'   => 'true',
                'response' => $data,
            ]);
        });

        // error（画面側でエラー処理させる）
        Response::macro('error', function ($errMsg = '', array $errors = []) {
            return response()->json([
                'result' => 'false',
                'errMsg' => $errMsg,
                'errors' => $errors
            ]);
        });

    }
}
