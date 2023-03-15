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
        '/storage/biden.jpg',
        '/storage/hirohito.jpg',
        '/storage/hitler.jpg',
        '/storage/kim.jpg',
        '/storage/putin.jpg',
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
