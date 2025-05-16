<?php

namespace App\Faker;

use Faker\Provider\Base;

class SocialMediaProvider extends Base
{
    protected static $socialMediaPlatforms = [
        [
            'icon' => 'fa-facebook-f',
            'name' => 'Facebook',
            'link' => 'https://facebook.com/vcare'
        ],
        [
            'icon' => 'fa-twitter',
            'name' => 'Twitter',
            'link' => 'https://twitter.com/vcare'
        ],
        [
            'icon' => 'fa-instagram',
            'name' => 'Instagram',
            'link' => 'https://instagram.com/vcare'
        ],
        [
            'icon' => 'fa-linkedin-in',
            'name' => 'LinkedIn',
            'link' => 'https://linkedin.com/company/vcare'
        ],
        [
            'icon' => 'fa-youtube',
            'name' => 'YouTube',
            'link' => 'https://youtube.com/c/vcare'
        ],
        [
            'icon' => 'fa-pinterest-p',
            'name' => 'Pinterest',
            'link' => 'https://pinterest.com/vcare'
        ],
        [
            'icon' => 'fa-tiktok',
            'name' => 'TikTok',
            'link' => 'https://tiktok.com/@vcare'
        ],
        [
            'icon' => 'fa-snapchat-ghost',
            'name' => 'Snapchat',
            'link' => 'https://snapchat.com/add/vcare'
        ],
        [
            'icon' => 'fa-telegram',
            'name' => 'Telegram',
            'link' => 'https://t.me/vcare'
        ],
        [
            'icon' => 'fa-whatsapp',
            'name' => 'WhatsApp',
            'link' => 'https://wa.me/1234567890'
        ]
    ];

    protected static $usedPlatforms = [];

    public function uniqueSocialMedia()
    {
        // Filter out already used platforms
        $availablePlatforms = array_diff_key(
            self::$socialMediaPlatforms, 
            array_flip(self::$usedPlatforms)
        );

        if (empty($availablePlatforms)) {
            throw new \OverflowException("No more unique social media platforms available.");
        }

        // Get random key from available platforms
        $randomKey = array_rand($availablePlatforms);
        
        // Store used key to avoid future duplicates
        self::$usedPlatforms[] = $randomKey;
        
        return self::$socialMediaPlatforms[$randomKey];
    }

}