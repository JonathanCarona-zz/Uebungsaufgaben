<?php

include("autoload.php");
include("/var/www/Uebungsaufgaben/Uebungsaufgaben/bibliothek2/src/autoload.php");

use PHPUnit\Framework\TestCase;

/**
 * @covers Renderer
 */
class RendererTest extends TestCase
{
    /** @var Renderer */
    private $renderer;
    /** @var XSLTProcessor | PHPUnit_Framework_MockObject_MockObject */
    private $proc;
    /** @var DOMDocument | PHPUnit_Framework_MockObject_MockObject*/
    private $dom;

    protected function setUp()
    {
        $this->proc = $this->createMock(XSLTProcessor::class);
        $this->dom = $this->createMock(DOMDocument::class);
        $this->renderer = new Renderer($this->proc);
    }

    public function testGetProc(): void
    {
        $this->assertEquals($this->proc, $this->renderer->getProc());
    }

    public function testRender(): void
    {
        $this->proc->method('transformToXml')->willReturn('test');
        $this->assertSame('test', $this->renderer->render($this->dom));
    }

}
