<?php
namespace Recommendation;

interface RendererInterface
{
    
    /**
     * Render Results
     * 
     * @param RecommendationResult[] $results
     * 
     * @return string
     */
    public function renderResults(array $results): string;
}

