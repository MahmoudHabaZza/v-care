<?php

namespace Database\Seeders;

use App\Models\Speciality;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SpecialitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $specialties = [
            'Allergy and Immunology',
            'Anesthesiology',
            'Cardiology',
            'Dermatology',
            'Emergency Medicine',
            'Endocrinology',
            'Family Medicine',
            'Gastroenterology',
            'General Surgery',
            'Geriatrics',
            'Hematology',
            'Infectious Disease',
            'Internal Medicine',
            'Medical Genetics',
            'Nephrology',
            'Neurology',
            'Neurosurgery',
            'Obstetrics and Gynecology',
            'Oncology',
            'Ophthalmology',
            'Orthopedic Surgery',
            'Otolaryngology (ENT)',
            'Pathology',
            'Pediatrics',
            'Physical Medicine and Rehabilitation',
            'Plastic Surgery',
            'Psychiatry',
            'Pulmonology',
            'Radiology',
            'Rheumatology',
            'Sleep Medicine',
            'Sports Medicine',
            'Thoracic Surgery',
            'Urology',
            'Vascular Surgery'
        ];

        
        foreach($specialties as $speciality){
            Speciality::firstOrCreate(['name' => $speciality]);
        }
    }
}
