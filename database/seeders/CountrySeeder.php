<?php

namespace Database\Seeders;

use App\Enums\CityEnum;
use App\Enums\CountryEnum;
use App\Facades\Country;
use App\Faker\CountryProvider;
use App\Models\City;
use App\Models\Country as ModelsCountry;
use App\Models\Zone;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // Truncate the tables
        \App\Models\Zone::truncate();
        \App\Models\City::truncate();
        \App\Models\Country::truncate();
    
        // Re-enable foreign key checks
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        
        $countries = Country::countries();
        foreach($countries as $country){
            $country_id = ModelsCountry::create(['name' => $country]);
            $cities = Country::cities($country);
            foreach($cities as $city){
                $city_id = City::create(['name' => $city,'country_id' => $country_id->id]);
                $zones = Country::zones($city);
                foreach($zones as $zone){
                    Zone::create([
                        'name' => $zone['name'],
                        'lat' => $zone['lat'],
                        'long' => $zone['long'],
                        'city_id' => $city_id->id
                    ]);
                }
            }
        }
    }
}
