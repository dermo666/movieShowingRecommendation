<?php
namespace Recommendation;

class RecommendationService
{

    /**
     * @var MovieShowingApiInterface
     */
    private $api;
    
    /**
     * Constructor 
     * 
     * @param MovieShowingApiInterface $api
     */
    public function __construct(
        MovieShowingApiInterface $api
    ) {
        $this->api = $api;
    }

    /**
     * Recommend Movies 
     * 
     * @param string $genre
     * @param string $time
     * 
     * @return array
     */
    public function recommendMovies(
        string $genre,
        string $time
    ): array
    {
        $movieShowings = $this->api->getMovieShowingsByGenre($genre);
        
        $results = [];
        
        // Find all movie showing that have a showing time 30 minutes ahead of the input time
        foreach ($movieShowings as $movieShowing) {
            $showings = $movieShowing->getShowingsWithoutTimezone();

            foreach ($showings as $showing) {
                // Note: This number could also be moved to config to make it configurable
                if (strtotime($showing) - strtotime($time) >= -1800) {
                    $results[] = new RecommendationResult($movieShowing, $showing);
                    
                    break;
                }
            }
        }
        
        if (count($results) > 1) {
            usort($results, [$this, 'ratingSortingMethod']);
        }

        return $results;
    }

    /**
     * Sort by Rating Desc - comparision method 
     * 
     * @param RecommendationResult $result1
     * @param RecommendationResult $result2
     * 
     * @return int
     */
    public function ratingSortingMethod(
        RecommendationResult $result1, 
        RecommendationResult $result2
    ): int 
    {
        return $result2->getRating() <=> $result1->getRating();
    }
}

