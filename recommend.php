<?php

use Recommendation\RecommendationService;
use Recommendation\MovieShowingPasteBinApi;

require_once 'bootstrap.php';

var_dump($argv);

$time = $argv[2] ?? '';
$genre = $argv[4] ?? '';

if (!$time || !$genre) {
    echo "Enter time and genre in format: php recommend.php time: \"12:00\" genre: \"Action & Adventure\"\n";
    exit; 
}

$api = new MovieShowingPasteBinApi();

$recomService = new RecommendationService($api);
$results = $recomService->recommendMovies($genre, $time);

var_dump($results);