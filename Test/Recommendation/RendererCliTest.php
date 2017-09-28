<?php

use Recommendation\RendererCli;
use PHPUnit\Framework\TestCase;
use Recommendation\RecommendationResult;

/**
 * RendererCli test case.
 */
class RendererCliTest extends TestCase
{

    /**
     *
     * @var RendererCli
     */
    private $rendererCli;

    /**
     * Prepares the environment before running a test.
     */
    protected function setUp()
    {
        parent::setUp();
        
        $this->rendererCli = new RendererCli();
    }

    /**
     * Cleans up the environment after running a test.
     */
    protected function tearDown()
    {
        $this->rendererCli = null;
        
        parent::tearDown();
    }

    /**
     * Tests RendererCli->renderResults()
     */
    public function testRenderResultsForSomeResults()
    {
        $result1 = $this->getMockBuilder(RecommendationResult::class)
                        ->disableOriginalConstructor()
                        ->getMock();
        $result1->expects($this->once())
                ->method('getName')
                ->willReturn('name1');
        $result1->expects($this->once())
                ->method('getShowing')
                ->willReturn('19:00');
        $result2 = $this->getMockBuilder(RecommendationResult::class)
                        ->disableOriginalConstructor()
                        ->getMock();
        $result2->expects($this->once())
                ->method('getName')
                ->willReturn('name2');
        $result2->expects($this->once())
                ->method('getShowing')
                ->willReturn('19:30');
        
        $actual = $this->rendererCli->renderResults([$result1, $result2]);
        $expected = "name1, showing at 7pm\nname2, showing at 7:30pm\n";
        $this->assertEquals($expected, $actual);
    }
    
    /**
     * Tests RendererCli->renderResults()
     */
    public function testRenderResultsForNoResults()
    {
        $actual = $this->rendererCli->renderResults([]);
        $expected = "no movie recommendations\n";
        $this->assertEquals($expected, $actual);
    }
}

