<?php
/**
 * Simplistic cli script to run recommendation service from console.
 * Format: php recommend.php time: "12:00" genre: "Animation"
 */

use Recommendation\RecommendationService;
use Recommendation\MovieShowingApi;

require_once 'bootstrap.php';

$time = $argv[2] ?? '';
$genre = $argv[4] ?? '';

if (!$time || !$genre) {
    echo "Enter time and genre in format: php recommend.php time: \"12:00\" genre: \"Action & Adventure\"\n";
    exit; 
}

$api = new MovieShowingApi('https://pastebin.com/raw/cVyp3McN');

$api->fetchMovieShowings();

$recomService = new RecommendationService($api);
$results = $recomService->recommendMovies($genre, $time);

var_dump($results);

// TODO: Format result