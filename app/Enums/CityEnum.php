<?php

namespace App\Enums;

enum CityEnum: string
{
    // Egypt
    case CAIRO = 'Cairo';
    case ALEXANDRIA = 'Alexandria';

    // United States
    case NEW_YORK = 'New York';
    case LOS_ANGELES = 'Los Angeles';

    // Russia
    case MOSCOW = 'Moscow';
    case SAINT_PETERSBURG = 'Saint Petersburg';

    // Japan
    case TOKYO = 'Tokyo';
    case OSAKA = 'Osaka';

    // France
    case PARIS = 'Paris';
    case LYON = 'Lyon';
}
