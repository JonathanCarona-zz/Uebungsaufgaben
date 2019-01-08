<?php

include("autoload.php");
include("/var/www/Uebungsaufgaben/Uebungsaufgaben/bibliothek2/src/autoload.php");

use PHPUnit\Framework\TestCase;


/**
 * @covers ErrorPage
 */
class ErrorPageTest extends TestCase
{
    /** @var ErrorPage */
    private $errorPage;
    /** @var Tool | PHPUnit_Framework_MockObject_MockObject */
    private $tool;

    protected function setUp()
    {
        $this->tool = $this->createMock(Tool::class);
        $this->errorPage = new ErrorPage($this->tool);
    }

    public function testGetPage()
    {
        $dom = $this->createMock(DOMDocument::class);
        $this->tool->method('getDom')->willReturn($dom);
        $this->assertEquals($dom, $this->errorPage->getPage());
    }

}
