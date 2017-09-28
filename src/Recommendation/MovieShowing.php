<?php

namespace Recommendation;

class MovieShowing
{
    
    private $name;
    
    private $rating;
    
    private $genres;
    
    private $showings;
    
    public function __construct(
        string $name,
        string $rating,
        array $genres,
        array $showings
    ) {
        $this->name = $name;
        $this->rating = $rating;
        $this->genres = $genres;
        $this->showings = $showings;
    }

    public function containsGenre(string $genre): bool
    {
        return in_array($genre, $this->genres);
    }
}