<?php

namespace Test\Recommendation\Mock;

class MovieShowingFixture
{
    static public $showing1 = [
        'name' => 'Zootopia',
        'rating' => 92,
        'genres' => [
            'Action & Adventure',
            'Animation',
            'Comedy'
        ],
        'showings' => [
            '19:00:00+11:00',
            '21:00:00+11:00'
        ]
    ];
    
    static public $showing2 = [
        'name' => 'Shaun The Sheep',
        'rating' => 80,
        'genres' => [
            'Animation',
            'Comedy'
        ],
        'showings' => [
            '19:00:00+11:00',
        ]
    ];
}