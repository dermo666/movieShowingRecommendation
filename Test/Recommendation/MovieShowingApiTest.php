<?php

use PHPUnit\Framework\TestCase;
use Recommendation\MovieShowingApi;

/**
 * MovieShowingApi test case.
 */
class MovieShowingApiTest extends TestCase
{

    /**
     *
     * @var MovieShowingApi
     */
    private $movieShowingApi;

    /**
     * Prepares the environment before running a test.
     */
    protected function setUp()
    {
        parent::setUp();
        
        $this->movieShowingApi = new MovieShowingApi(__DIR__.'/Mock/data.txt');
    }

    /**
     * Cleans up the environment after running a test.
     */
    protected function tearDown()
    {
        $this->movieShowingApi = null;
        
        parent::tearDown();
    }
    
    public function testFetchesDataAndReturnsMovieShowings()
    {
        $moviesShowings = $this->movieShowingApi->fetchMovieShowings();
        
        $this->assertCount(4, $moviesShowings);
        $this->assertEquals('Moonlight', $moviesShowings[0]->getName());
        $this->assertEquals('Zootopia', $moviesShowings[1]->getName());
        $this->assertEquals('The Martian', $moviesShowings[2]->getName());
        $this->assertEquals('Shaun The Sheep', $moviesShowings[3]->getName());
    }
    
    public function testReturnsMovieShowingByGenre()
    {
        $moviesShowings = $this->movieShowingApi->getMovieShowingsByGenre('Animation');
        
        $this->assertCount(2, $moviesShowings);
        $this->assertEquals('Zootopia', $moviesShowings[0]->getName());
        $this->assertEquals('Shaun The Sheep', $moviesShowings[1]->getName());
    }
}

