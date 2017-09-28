<?php
use PHPUnit\Framework\TestCase;
use Recommendation\MovieShowing;
use Test\Recommendation\Mock\MovieShowingFixture;

require_once __DIR__.'/Mock/MovieShowingFixture.php';

/**
 * MovieShowing test case.
 */
class MovieShowingTest extends TestCase
{
    public function setUp()
    {
        $this->showing1 = MovieShowingFixture::$showing1;
    }

    public function testContainsGenreReturnsTrueIfShowingContainsGenre()
    {
        $movieShowing = new MovieShowing($this->showing1['name'], $this->showing1['rating'], $this->showing1['genres'], $this->showing1['showings']);
        
        $this->assertTrue($movieShowing->containsGenre('Animation')); 
    }
    
    public function testContainsGenreReturnsFalseIfShowingDoesNotContainGenre()
    {
        $movieShowing = new MovieShowing($this->showing1['name'], $this->showing1['rating'], $this->showing1['genres'], $this->showing1['showings']);
        
        $this->assertFalse($movieShowing->containsGenre('Horror'));
    }
}

