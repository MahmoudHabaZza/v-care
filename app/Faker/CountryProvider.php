<?php

namespace App\Faker;

use App\Enums\CityEnum;
use App\Enums\CountryEnum;
use App\Facades\Country;
use Exception;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\File;

class CountryProvider {
    private Collection|array $countries = [];
    public function __construct()
    {
        $this->countries = collect(json_decode(File::get(storage_path('country.json')),true)['countries']);
        
    }
    public function countries()
    {
        
       return $this->countries->map(fn($c) => $c['name']);
    }
    public function cities(CountryEnum|string $country){
        $country = $this->countries->first(fn($c) => $c['name'] == (isset($country->value) ? $country->value : $country));
        if(!$country) throw new Exception("This Country Not Found");
        return collect($country['cities'])->map(fn($c) => $c['name']);
    }
    public function zones(CityEnum|string $city_name){
        $zones = [];
        $this->countries->each(function($country) use($city_name,&$zones){
            $city = collect($country['cities'])->first(fn($city) => $city['name'] == (isset($city_name->value) ? $city_name->value : $city_name));
            if($city){
                $zones = collect($city['zones']);
            }
        });
        return $zones;
    }
}