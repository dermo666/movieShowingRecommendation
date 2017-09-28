<?php
namespace Recommendation;

class RendererCli implements RendererInterface
{
    
    /**
     * Render Results for CLI
     * 
     * @param RecommendationResult[] $results
     * 
     * @return string
     */
    public function renderResults(array $results): string
    {
        $output = '';
        
        foreach ($results as $result) {
            $formattedShowing = $this->getFormattedShowing($result->getShowing());
            $output .= "{$result->getName()}, showing at {$formattedShowing}\n";
        }
        
        if (!$output) {
            // Note: This should come from translation file (eg. Symfony3)
            $output = "no movie recommendations\n";
        }
        
        return $output;
    }
    
    /**
     * Get Formatted Showing
     *
     * @return string
     */
    private function getFormattedShowing(string $showing): string
    {
        $dateTime = new \DateTime($showing);
        
        // Note: the format values could be moved to config
        // Note: in order to share the formatting functionality it could be extracted into separate object and
        // injected into other Renderers
        if ( $dateTime->format('i') === '00') {
            return $dateTime->format('ga');
        } else {
            return $dateTime->format('g:ia');
        }
    }
}

