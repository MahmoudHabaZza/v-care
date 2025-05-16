<?php

namespace App\Faker;

use Exception;
use Faker\Provider\Base;
use Illuminate\Support\Arr;

class HomePageServiceProvider extends Base
{
    protected static $services = [
        [
            'icon' => 'fa-user-md',
            'title' => 'Online Consultations',
            'description' => 'Connect with experienced doctors from the comfort of your home through secure video consultations available 24/7.'
        ],
        [
            'icon' => 'fa-calendar-check',
            'title' => 'Appointment Scheduling',
            'description' => 'Book, reschedule, or cancel appointments with your preferred healthcare providers with just a few clicks.'
        ],
        [
            'icon' => 'fa-file-medical',
            'title' => 'Electronic Health Records',
            'description' => 'Access your complete medical history, test results, and treatment plans securely anytime, anywhere.'
        ],
        [
            'icon' => 'fa-pills',
            'title' => 'Medication Management',
            'description' => 'Receive timely medication reminders and easily request prescription refills from your doctor.'
        ],
        [
            'icon' => 'fa-heartbeat',
            'title' => 'Preventive Care',
            'description' => 'Get personalized preventive care recommendations based on your age, gender, and medical history.'
        ],
        [
            'icon' => 'fa-stethoscope',
            'title' => 'Specialist Referrals',
            'description' => 'Seamless referrals to specialists with complete transfer of relevant medical information for continuous care.'
        ],
        [
            'icon' => 'fa-hospital',
            'title' => 'Hospital Locator',
            'description' => 'Find nearby hospitals and emergency care centers with real-time availability and waiting time information.'
        ],
        [
            'icon' => 'fa-comments',
            'title' => 'Patient Support',
            'description' => 'Connect with healthcare advocates who can help navigate insurance claims and answer billing questions.'
        ],
        [
            'icon' => 'fa-clipboard-list',
            'title' => 'Health Assessments',
            'description' => 'Take comprehensive health assessments to identify potential health risks and receive customized care plans.'
        ],
        [
            'icon' => 'fa-mobile-alt',
            'title' => 'Mobile Health Monitoring',
            'description' => 'Track vital signs, symptoms, and health metrics using connected devices for improved chronic disease management.'
        ],
        [
            'icon' => 'fa-users',
            'title' => 'Family Health',
            'description' => 'Manage healthcare for your entire family with multiple profiles and guardianship access controls.'
        ],
        [
            'icon' => 'fa-comment-medical',
            'title' => 'AI Symptom Checker',
            'description' => 'Get preliminary insights about your symptoms before consulting with healthcare professionals.'
        ]
    ];

    protected static $usedServices = [];
    public function generateHomePageService(){

        $availableServices = array_diff_key(static::$services,array_flip(static::$usedServices));
        
        if(empty($availableServices)){
            throw new Exception("No Avaiable Services Yet!");
        }

        $randomServiceKey = array_rand($availableServices);
        static::$usedServices[] = $randomServiceKey;

         return $availableServices[$randomServiceKey];

    }
}
