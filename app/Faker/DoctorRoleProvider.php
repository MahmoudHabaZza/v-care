<?php

namespace App\Faker;

use Faker\Provider\Base;

class DoctorRoleProvider extends Base
{
    protected static $titles = [
        'Dr.',
        'Prof. Dr.',
        'Dr. med.',
        'Dr. rer. nat.',
        'Dr. phil.',
        'Dr. h.c.',
        'Prof. Dr. med.',
        'Prof. Dr. rer. nat.',
        'Dr. jur.',
        'Dr. theol.',
    ];

    protected static $usedTitles = [];

    public function uniqueDoctorRole()
    {
        $availableTitles = array_diff(self::$titles, self::$usedTitles);

        if (empty($availableTitles)) {
            throw new \OverflowException("No more unique doctor titles available.");
        }

        $title = static::randomElement($availableTitles);
        self::$usedTitles[] = $title;

        return $title;
    }

}