<?php

use PHPUnit\Framework\TestCase;

/**
 * @covers IndexPage
 */
class IndexPageTest extends TestCase
{
    /** @var IndexPage */
    private $indexPage;
    /** @var Tool | PHPUnit_Framework_MockObject_MockObject */
    private $tool;
    /** @var Request | PHPUnit_Framework_MockObject_MockObject */
    private $request;
    /** @var Filter */
    private $filter;


    protected function setUp()
    {
        $this->filter = $this->createMock(Filter::class);
        $this->tool = $this->createMock(Tool::class);
        $this->request = $this->createMock(Request::class);

        $this->indexPage = new IndexPage($this->request, $this->tool, $this->filter);
    }

    public function testGetPage(): void
    {
        $dom = $this->createMock(DOMDocument::class);
        $this->request->method('receivedRequest')->willReturn(true);
        $this->tool->method('getDom')->willReturn($dom);
        $this->assertEquals($dom, $this->indexPage->getPage());
    }


}
