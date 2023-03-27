<?php

namespace App\Faker;

use Faker\Provider\Base;

class UserProvider extends Base
{
    protected static $dictators = [
        'Adolf Hitler',
        'Benito Mussolini',
        'Joseph Stalin',
        'Mao Zedong',
        'Pol Pot',
        'Saddam Hussein',
        'Augusto Pinochet',
        'Francisco Franco',
        'Idi Amin',
        'Kim Il-sung',
        'Kim Jong-il',
        'Kim Jong-un',
        'Vladimir Putin',
        'Nicolae Ceaușescu',
        'Fidel Castro',
        'Hugo Chávez',
        'Juan Perón',
        'Mobutu Sese Seko',
        'Robert Mugabe',
        'Muammar Gaddafi',
        'Yahya Jammeh',
        'Charles Taylor',
        'Jean-Claude Duvalier',
        'Anastasio Somoza Debayle',
        'Manuel Noriega',
        'Antonio Salazar',
        'Park Chung-hee',
        'Syngman Rhee',
        'Suharto',
        'Slobodan Milošević',
        'Hun Sen',
        'Than Shwe',
        'Teodoro Obiang Nguema Mbasogo',
        'Isaias Afwerki',
        'Saparmurat Niyazov',
        'Alexander Lukashenko',
        'Bashar al-Assad',
        'Ali Khamenei',
        'Nursultan Nazarbayev',
        'Islam Karimov',
        'Emomali Rahmon',
        'Gurbanguly Berdimuhamedow',
        'Ilham Aliyev',
        'Recep Tayyip Erdogan',
        'Kim Yong-chol',
        'Abdel Fattah el-Sisi',
        'Xi Jinping',
        'Raul Castro',
        'Daniel Ortega',
        'Rodrigo Duterte',
    ];

    protected static $userImages = [
        '/storage/faker/biden.jpg',
        '/storage/faker/hirohito.jpg',
        '/storage/faker/hitler.jpg',
        '/storage/faker/kim.jpg',
        '/storage/faker/putin.jpg',
        '/storage/faker/faker_user (1).avif',
        '/storage/faker/faker_user (1).jpeg',
        '/storage/faker/faker_user (1).jpg',
        '/storage/faker/faker_user (1).png',
        '/storage/faker/faker_user (1).webp',
        '/storage/faker/faker_user (2).avif',
        '/storage/faker/faker_user (2).jpeg',
        '/storage/faker/faker_user (2).jpg',
        '/storage/faker/faker_user (2).webp',
        '/storage/faker/faker_user (3).avif',
        '/storage/faker/faker_user (3).jpg',
        '/storage/faker/faker_user (3).webp',
        '/storage/faker/faker_user (4).avif',
        '/storage/faker/faker_user (4).jpg',
        '/storage/faker/faker_user (5).jpg',
        '/storage/faker/faker_user (6).jpg',
        '/storage/faker/faker_user (7).jpg',
        '/storage/faker/faker_user (8).jpg',
        '/storage/faker/faker_user (9).jpg',
        '/storage/faker/faker_user (10).jpg',
        '/storage/faker/faker_user (11).jpg',
    ];

    public function dictatorName(): string
    {
        return static::randomElement(static::$dictators);
    }

    public function userImage(): string
    {
        return static::randomElement(static::$userImages);
    }
}
