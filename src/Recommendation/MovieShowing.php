<?php

namespace Recommendation;

/**
 * Movie Showing Value Object
 */
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
    
    public function getShowings(): array
    {
        return $this->showings;
    }
    
    public function getShowingsWithoutTimezone(): array
    {
        $result = [];
        
        foreach ($this->showings as $showing) {
            $result[] = substr($showing, 0, 5);
        }
        return $result;
    }
    
    public function getRating(): int
    {
        return $this->rating;
    }

    public function getName()
    {
        return $this->name;
    }

}