<?php
namespace Recommendation;

use Test\Recommendation\Mock\MovieShowingFixture;

require_once __DIR__.'/../../Test/Recommendation/Mock/MovieShowingFixture.php';

class MovieShowingPasteBinApi implements MovieShowingApiInterface
{
    
    public function fetchMovieShowings(): array
    {
        
    }
    
    /**
     * Get Movie Showing By Genre
     * 
     * @param string $genre
     * @return MovieShowing[]
     */
    public function getMovieShowingsByGenre(string $genre): array
    {
        return [
            new MovieShowing(MovieShowingFixture::$showing1['name'], MovieShowingFixture::$showing1['rating'], MovieShowingFixture::$showing1['genres'], MovieShowingFixture::$showing1['showings']),
            new MovieShowing(MovieShowingFixture::$showing2['name'], MovieShowingFixture::$showing2['rating'], MovieShowingFixture::$showing2['genres'], MovieShowingFixture::$showing2['showings'])
        ];
    }
}