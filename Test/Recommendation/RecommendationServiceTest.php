<?php

use PHPUnit\Framework\TestCase;
use Recommendation\RecommendationService;
use Recommendation\MovieShowing;
use Test\Recommendation\Mock\MovieShowingFixture;

require_once __DIR__.'/Mock/MovieShowingFixture.php';

/**
 * RecommendationService test case.
 */
class RecommendationServiceTest extends TestCase
{
    private $showing1;
    
    private $showing2;
    
    public function setUp()
    {
        $this->showing1 = new MovieShowing(MovieShowingFixture::$showing1['name'], MovieShowingFixture::$showing1['rating'], MovieShowingFixture::$showing1['genres'], MovieShowingFixture::$showing1['showings']);
        $this->showing2 = new MovieShowing(MovieShowingFixture::$showing2['name'], MovieShowingFixture::$showing2['rating'], MovieShowingFixture::$showing2['genres'], MovieShowingFixture::$showing2['showings']);
    }
    
    public function testRecommendMoviesReturnsBothMovieShowingEarlyTime()
    {
        $apiMock = $this->getMockBuilder('Recommendation\MovieShowingApiInterface')
                        ->getMock();
        
        $apiMock->expects($this->once())
                ->method('getMovieShowingsByGenre')
                ->with($this->equalTo('Animation'))
                ->willReturn([$this->showing1, $this->showing2]);
                
        $service = new RecommendationService($apiMock);
        $results = $service->recommendMovies('Animation', '12:00');
        
        $this->assertCount(2, $results);
        $this->assertEquals('Zootopia', $results[0]->getName());
        $this->assertEquals('19:00', $results[0]->getShowing());
        $this->assertEquals('Shaun The Sheep', $results[1]->getName());
        $this->assertEquals('19:00', $results[1]->getShowing());
    }
    
    public function testRecommendMoviesReturnsOnlyOneShowingForLaterTime()
    {
        $apiMock = $this->getMockBuilder('Recommendation\MovieShowingApiInterface')
                        ->getMock();
        
        $apiMock->expects($this->once())
                ->method('getMovieShowingsByGenre')
                ->with($this->equalTo('Animation'))
                ->willReturn([$this->showing1, $this->showing2]);
        
        $service = new RecommendationService($apiMock);
        $results = $service->recommendMovies('Animation', '20:00');
        
        $this->assertCount(1, $results);
        $this->assertEquals('Zootopia', $results[0]->getName());
        $this->assertEquals('21:00', $results[0]->getShowing());
    }
    
    public function testRecommendMoviesReturnsOnlyBothShowingsForHalfAnHourAhead()
    {
        $apiMock = $this->getMockBuilder('Recommendation\MovieShowingApiInterface')
                        ->getMock();
        
        $apiMock->expects($this->once())
                ->method('getMovieShowingsByGenre')
                ->with($this->equalTo('Animation'))
                ->willReturn([$this->showing1, $this->showing2]);
        
        $service = new RecommendationService($apiMock);
        $results = $service->recommendMovies('Animation', '19:30');
        
        $this->assertCount(2, $results);
        $this->assertEquals('Zootopia', $results[0]->getName());
        $this->assertEquals('19:00', $results[0]->getShowing());
        $this->assertEquals('Shaun The Sheep', $results[1]->getName());
        $this->assertEquals('19:00', $results[1]->getShowing());
    }
}

