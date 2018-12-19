<?php

include("autoload.php");

use PHPUnit\Framework\TestCase;

class ToolTest extends TestCase
{
    /** @var Tool */
    private $tool;
    /** @var DOMDocument */
    private $dom;
    /** @var DOMDocument */
    private $xsl;
    /** @var XSLTProcessor */
    private $proc;
    /** @var DOMXPath */
    private $xpath;

    protected function setUp()
    {
        $this->dom = $this->createMock(DOMDocument::class);
        $this->xsl = $this->createMock(DOMDocument::class);
        $this->proc = $this->createMock(XSLTProcessor::class);
        $this->xpath = $this->createMock(DOMXPath::class);

        $this->tool = new Tool($this->dom, $this->xsl, $this->proc, $this->xpath);
    }

    public function testGetDom(): void
    {
        $this->assertEquals($this->dom, $this->tool->getDom());
    }


}
