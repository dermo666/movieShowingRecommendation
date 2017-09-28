<?php
namespace Recommendation;

interface MovieShowingApiInterface
{
    
    public function fetchMovieShowings(): array;
    
    /**
     * Get Movie Showing By Genre
     * 
     * @param string $genre
     * @return MovieShowing[]
     */
    public function getMovieShowingsByGenre(string $genre): array;
}