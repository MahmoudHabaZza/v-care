<?php

namespace App\Providers;

use App\Faker\CountryProvider;
use App\Faker\DoctorRoleProvider;
use App\Faker\HomePageServiceProvider;
use App\Faker\SocialMediaProvider;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {

        $this->app->singleton('country',CountryProvider::class);

        // test => testing repo object , or production => doctor role repository

        Response::macro('successResponse',function($data,$message = "Success",$statusCode = 200){
            return response()->json([
                'success' => true,
                'message' => $message,
                'data' => $data,
            ],$statusCode);
        });

        Response::macro('errorResponse',function($message = "Something Went Wrong!",$statusCode = 400){ // 400 => Bad Request
            return response()->json([
                'success' => false,
                'message' => $message
            ],$statusCode);
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        fake()->addProvider(new DoctorRoleProvider(fake()));
        fake()->addProvider(new HomePageServiceProvider(fake()));
        fake()->addProvider(new SocialMediaProvider(fake()));
    }
}
