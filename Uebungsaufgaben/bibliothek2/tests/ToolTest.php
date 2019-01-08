<?php

include("autoload.php");
include("/var/www/Uebungsaufgaben/Uebungsaufgaben/bibliothek2/src/autoload.php");

use PHPUnit\Framework\TestCase;

/**
 * @covers Tool
 */
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
    /** @var Factory */
    private $factory;

    protected function setUp()
    {
        $this->dom = $this->createMock(DOMDocument::class);
        $this->xsl = $this->createMock(DOMDocument::class);
        $this->proc = $this->createMock(XSLTProcessor::class);
        $this->xpath = $this->createMock(DOMXPath::class);
        $this->factory = $this->createMock(Factory::class);
        $this->factory->method('createXPATH')->willReturn($this->xpath);
        $this->tool = new Tool($this->dom, $this->xsl, $this->proc, $this->factory);
    }

    public function testGetDom(): void
    {
        $this->assertSame($this->dom, $this->tool->getDom());
    }

    public function testGetXpath(): void
    {
        $this->assertSame($this->xpath, $this->tool->getXpath());
    }

    public function testGetXsl(): void
    {
        $this->assertSame($this->xsl, $this->tool->getXsl());
    }

    public function testGetXSLTProcessor(): void
    {
        $this->assertSame($this->proc, $this->tool->getXSLTProcessor());
    }

}
