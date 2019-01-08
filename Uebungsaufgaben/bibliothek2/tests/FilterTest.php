<?php

include("autoload.php");
include("/var/www/Uebungsaufgaben/Uebungsaufgaben/bibliothek2/src/autoload.php");

use PHPUnit\Framework\TestCase;

/**
 * @covers Filter
 */
class FilterTest extends TestCase
{
    /** @var Filter */
    private $filter;


    protected function setUp()
    {
        $this->filter = new Filter();
    }

    public function testFilter(): void
    {
        /** @var Request | PHPUnit_Framework_MockObject_MockObject $request */
        $request = $this->createMock(Request::class);
        /** @var XSLTProcessor | PHPUnit_Framework_MockObject_MockObject $xsltProc */
        $xsltProc = $this->createMock(XSLTProcessor::class);
        $dom = new DOMDocument();
        $dom->load('/var/www/Uebungsaufgaben/Uebungsaufgaben/bibliothek2/tests/books.xml');
        /** @var DOMXPath | PHPUnit_Framework_MockObject_MockObject $xpath */
        $xpath = new DOMXPath($dom);


        $request->method('hasParameter')->willReturn(true);
        $request->method('getParameter')->willReturnOnConsecutiveCalls(
            'Randall, Cynthia',
            'Lover Birds',
            'author'
        );

        $this->filter->filter($dom, $request, $xpath, $xsltProc);

        $this->assertXmlStringEqualsXmlFile(
            '/var/www/Uebungsaufgaben/Uebungsaufgaben/bibliothek2/tests/expectedFilterResult.xml',
            $dom->saveXML()
        );
    }
}
