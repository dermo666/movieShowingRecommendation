<?php
use PHPUnit\Framework\TestCase;
use Recommendation\MovieShowing;

/**
 * MovieShowing test case.
 */
class MovieShowingTest extends TestCase
{

    private $fixture = [
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

    public function testContainsGenreReturnsTrueIfShowingContainsGenre()
    {
        $movieShowing = new MovieShowing($this->fixture['name'], $this->fixture['rating'], $this->fixture['genres'], $this->fixture['showings']);
        
        $this->assertTrue($movieShowing->containsGenre('Animation')); 
    }
}

