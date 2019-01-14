<?php


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

    public function testFilteringForAuthorAndBookWorks(): void
    {
        /** @var Request | PHPUnit_Framework_MockObject_MockObject $request */
        $request = $this->createMock(Request::class);
        /** @var XSLTProcessor | PHPUnit_Framework_MockObject_MockObject $xsltProc */
        $xsltProc = $this->createMock(XSLTProcessor::class);
        $dom = new DOMDocument();
        $dom->load(__DIR__.'/books.xml');
        $xpath = new DOMXPath($dom);

        $request->method('hasParameter')->willReturn(true);
        $request->method('getParameter')->willReturnOnConsecutiveCalls(
            'Randall, Cynthia',
            'Lover Birds',
            'author'
        );

        $this->filter->filter($dom, $request, $xpath, $xsltProc);

        $this->assertXmlStringEqualsXmlFile(
            __DIR__.'/expectedFilterResult.xml',
            $dom->saveXML()
        );
    }
}
