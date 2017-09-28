<?php

namespace Recommendation;

/**
 * Movie Showing Value Object
 */
class MovieShowing
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $rating;

    /**
     * @var array
     */
    private $genres;

    /**
     * @var array
     */
    private $showings;
    
    /**
     * Constructor
     * 
     * @param string $name
     * @param string $rating
     * @param array $genres
     * @param array $showings
     */
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

    /**
     * Contains Genre
     * 
     * @param string $genre
     * 
     * @return bool
     */
    public function containsGenre(string $genre): bool
    {
        return in_array($genre, $this->genres);
    }
    
    /**
     * Get Showings
     * 
     * @return array
     */
    public function getShowings(): array
    {
        return $this->showings;
    }
    
    /**
     * Get Showings Without Timezone (from 18:30:00+11:00 to 18:30)
     * 
     * @return array
     */
    public function getShowingsWithoutTimezone(): array
    {
        $result = [];
        
        foreach ($this->showings as $showing) {
            $result[] = substr($showing, 0, 5);
        }
        return $result;
    }
    
    /**
     * Get Rating
     * 
     * @return int
     */
    public function getRating(): int
    {
        return $this->rating;
    }

    /**
     * Get Name
     *  
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

}