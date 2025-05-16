<?php 

namespace App\Facades;

use Illuminate\Support\Facades\Facade;


/**
 * @method static array countries()
 * @method static array cities(\App\Enums\CountryEnum|string $country)
 * @method static array zones(\App\Enums\CityEnum|string $city)
 */
class Country extends Facade {
    protected static function getFacadeAccessor()
    {
        return 'country';
    }
}