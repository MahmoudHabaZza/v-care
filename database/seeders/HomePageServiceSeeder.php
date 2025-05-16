<?php

namespace Database\Seeders;

use App\Models\HomePageService;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HomePageServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;'); 
        DB::table('home_page_services')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;'); 
        HomePageService::factory(11)->create();
    }
}
