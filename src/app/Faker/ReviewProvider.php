<?php

namespace App\Faker;

use Faker\Provider\Base;

class ReviewProvider extends Base
{
    protected static $reviews = [
        "This coffee maker is amazing! It's easy to use and makes great coffee.",
        'The headphones sound great and are very comfortable to wear for long periods of time.',
        "I love this vacuum cleaner. It's powerful and easy to maneuver around furniture.",
        "This laptop is perfect for my needs. It's fast, has a long battery life, and the screen is very clear.",
        'The camera takes amazing photos and the video quality is excellent.',
        "I've been using this fitness tracker for a few weeks now and it's been really helpful in keeping me on track with my exercise goals.",
        'This toaster works perfectly and looks great on my kitchen counter.',
        'The sound system is top-notch and the bass is impressive.',
        "This gaming mouse is a great upgrade from my old one. It's very precise and has a lot of customization options.",
        'The tablet is fast and responsive, and the screen is very clear and bright.',
        'I love this electric kettle. It heats up quickly and the auto-shutoff feature is very convenient.',
        'The printer is easy to set up and the print quality is very good.',
        'This blender is powerful and works great for making smoothies and other drinks.',
        'The smartwatch has a lot of useful features and the battery life is impressive.',
        'This car stereo sounds great and the Bluetooth connectivity is very convenient.',
        'The keyboard is comfortable to type on and the backlighting is a nice touch.',
        'This external hard drive is fast and has a lot of storage space.',
        'The monitor has a very clear picture and the size is perfect for my needs.',
        "I love this air purifier. It's very effective at removing dust and allergens from the air.",
        "The power bank is a lifesaver when I'm on the go and need to charge my devices.",
    ];

    protected static $images = [
        '/storage/faker/mush1.png',
        '/storage/faker/mush2.jpg',
        '/storage/faker/faker_reviews (1).jpeg',
        '/storage/faker/faker_reviews (1).jpg',
        '/storage/faker/faker_reviews (1).webp',
        '/storage/faker/faker_reviews (2).jpeg',
        '/storage/faker/faker_reviews (2).jpg',
        '/storage/faker/faker_reviews (2).webp',
        '/storage/faker/faker_reviews (3).jpg',
        '/storage/faker/faker_reviews (4).jpg',
        '/storage/faker/faker_reviews (5).jpg',
        '/storage/faker/faker_reviews (6).jpg',
        '/storage/faker/faker_reviews (7).jpg',
        '/storage/faker/faker_reviews (8).jpg',
        '/storage/faker/faker_reviews (9).jpg',
        '/storage/faker/faker_reviews (10).jpg',
        '/storage/faker/faker_reviews (11).jpg',
        '/storage/faker/faker_reviews (12).jpg',
    ];

    public function reviews(): string
    {
        return static::randomElement(static::$reviews);
    }

    public function reviewImage(): string
    {
        return static::randomElement(static::$images);
    }
}
