<?php

namespace Recommendation;

/**
 * Movie Showing Value Object
 */
class RecommendationResult
{
    /**
     * @var MovieShowing
     */
    private $movieShowing;
    
    /**
     * @var string
     */
    private $showing;
    
    public function __construct(
        MovieShowing $movieShowing,
        string $showing
    ) {
        $this->movieShowing = $movieShowing;
        $this->showing = $showing;
    }
    /**
     * Get Rating
     * 
     * @return int
     */
    public function getRating(): int
    {
        return $this->movieShowing->getRating();
    }

    /**
     * Get Showing
     * 
     * @return string
     */
    public function getShowing(): string
    {
        return $this->showing;
    }
    
    /**
     * Get Name
     * 
     * @return string
     */
    public function getName(): string
    {
        return $this->movieShowing->getName();
    }
}