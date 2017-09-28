<?php
namespace Recommendation;

use Test\Recommendation\Mock\MovieShowingFixture;

require_once __DIR__.'/../../Test/Recommendation/Mock/MovieShowingFixture.php';

class MovieShowingApi implements MovieShowingApiInterface
{
    
    /**
     * @var string
     */
    private $filename;

    /**
     * Constructor
     * 
     * @param string $filename Filename or URL
     */
    public function __construct(string $filename)
    { 
        $this->filename = $filename;
    }
    
    /**
     * Fetch Movie Showings
     * {@inheritDoc}
     * @see \Recommendation\MovieShowingApiInterface::fetchMovieShowings()
     * 
     * @return MovieShowing[]
     */
    public function fetchMovieShowings(): array
    {
        // Note: This is simple and works fine but it could be replaced by eg Guzzle and injected through constructor
        // Note: The way of reading from origin could be hidden behind another layer of abstraction using adapters 
        // for SOAP, XLS, DB etc  but for purposes of this exercise I find this solution ok
        $json = file_get_contents($this->filename);

        $objects = json_decode($json);
        $movieShowings = [];
        
        foreach ($objects as $object) {
            $movieShowings[] = new MovieShowing($object->name, $object->rating, $object->genres, $object->showings);
        }
        
        return $movieShowings;
    }
    
    /**
     * Get Movie Showing By Genre
     * 
     * @param string $genre
     * 
     * @return MovieShowing[]
     */
    public function getMovieShowingsByGenre(string $genre): array
    {
        $movieShowings = $this->fetchMovieShowings();
        $filteredMovieShowings = [];
        
        foreach ($movieShowings as $movieShowing) {
            if ($movieShowing->containsGenre($genre)) {
                $filteredMovieShowings[] = $movieShowing;
            }
        }
        
        return $filteredMovieShowings;
    }
}