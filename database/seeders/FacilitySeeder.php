<?php

namespace Database\Seeders;

use App\Enums\FacilityTypeEnum;
use App\Models\Facility;
use App\Models\Zone;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FacilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $zones = Zone::whereIn('name', ['Zamalek', 'Maadi', 'Nasr City'])->get()->keyBy('name');
        $hospitalNames = [
            'Maadi Specialized Hospital',
            'Al Salam International Hospital - Maadi',
            'Maadi Armed Forces Hospital',
            'Cleopatra Hospital - Maadi Branch',
            'Future Care Hospital - Maadi',
            'Zamalek International Hospital',
            'Nile Med Hospital - Zamalek',
            'Zamalek General Hospital',
            'Golden Life Hospital - Zamalek',
            'Nasr City Medical Center',
            'Dar Al Fouad Hospital - Nasr City',
            'Al Hayat Specialized Hospital',
            'International Hospital of Nasr City',
            'Nasr City University Hospital',
            'Al Shifa Medical Hospital - Nasr City',
        ];

        $clinicNames = [
            'Maadi Family Clinic',
            'Green Care Clinic - Maadi',
            'Elite Dental & Derma Clinic - Maadi',
            'Healing Touch Clinic - Maadi',
            'Prime Care Clinic - Maadi',
            'Zamalek Wellness Clinic',
            'The Skin Hub - Zamalek',
            'Zamalek Pediatric Center',
            'Zamalek Eye & Dental Clinic',
            'Nasr City Medical Center for Women',
            'Nasr City Ortho & Spine Clinic',
            'Al Amal Family Clinic - Nasr City',
            'Healthy Smile Clinic - Nasr City',
            'Nasr City Derma & Laser Clinic',
            'Prime Cardio Clinic - Nasr City',
        ];

        foreach ($zones as $zoneName => $zone) {
            for ($i = 0; $i < 15; $i++) {
                $isHospital = $i % 2 == 0;
                $name = $isHospital ? $hospitalNames[$i] : $clinicNames[$i];
                Facility::firstOrCreate([
                    'name' => $name,
                    'type' => $isHospital ? FacilityTypeEnum::Hospital : FacilityTypeEnum::Clinic,
                    'address' => "{$zoneName} ,Cairo ,Egypt",
                    'address_link' => "https://maps.google.com/?q=" . $zone->lat . "," . $zone->long,
                    'description' => "$zoneName, We Serve the Patients with best Care",
                    'phone_number' => fake()->randomElement(["010","011","012"]) . rand(10000000,99999999),
                    'zone_id' => $zone->id,
                    'facility_admin_id' => null,
                ]);
            }
        }
    }
}
