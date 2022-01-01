<?php

namespace App\Helpers;



class RandomColor
{
    /**
     * @var \string[][]
     */
    private static $possibleColors = [
        '#c8a67',
        '#a75e66',
        '#ffcfb3',
        '#aaaaaa',
        '#8cb596',
        '#6a938b',
        '#f0c1aa',
        '#614944',
        '#f1c296',
        '#886eaa',
        '#eaa0a2',
    ];

    public static function insert(int $seed): string
    {
        return RandomColor::$possibleColors[$seed % count(RandomColor::$possibleColors)];
    }
}
