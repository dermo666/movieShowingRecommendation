<?php
namespace Recommendation;

interface MovieShowingApiInterface
{

    /**
     * Fetch Movie Showings
     *
     * @return MovieShowing[]
     */
    public function fetchMovieShowings(): array;
    
    /**
     * Get Movie Showings By Genre
     * 
     * @param string $genre
     * @return MovieShowing[]
     */
    public function getMovieShowingsByGenre(string $genre): array;
}