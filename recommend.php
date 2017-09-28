<?php
/**
 * Simplistic cli script to run recommendation service from console.
 * Format: php recommend.php time: "12:00" genre: "Animation"
 */

use Recommendation\RecommendationService;
use Recommendation\MovieShowingApi;
use Recommendation\RendererCli;

require_once 'bootstrap.php';
require_once 'config.php';

$time = $argv[2] ?? '';
$genre = $argv[4] ?? '';

if (!$time || !$genre) {
    echo "Enter time and genre in format: php recommend.php time: \"12:00\" genre: \"Action & Adventure\"\n";
    exit; 
}

$api = new MovieShowingApi(CONFIG['apiPath']);

$recomService = new RecommendationService($api);
$results = $recomService->recommendMovies($genre, $time);

$renderer = new RendererCli();
echo $renderer->renderResults($results);