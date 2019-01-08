<?php

use PHPUnit\Framework\TestCase;


/**
 * @covers RecordCreatorPage
 */
class RecordCreatorPageTest extends TestCase
{
    /** @var RecordCreator | PHPUnit_Framework_MockObject_MockObject */
    private $recordCreator;
    /** @var Request | PHPUnit_Framework_MockObject_MockObject */
    private $request;
    /** @var Tool | PHPUnit_Framework_MockObject_MockObject */
    private $tool;
    /** @var RecordCreatorPage */
    private $recordCreatorPage;




    protected function setUp()
    {
        $this->request = $this->createMock(Request::class);
        $this->tool = $this->createMock(Tool::class);
        $this->recordCreator = $this->createMock(RecordCreator::class);

        $this->recordCreatorPage = new RecordCreatorPage($this->request, $this->tool, $this->recordCreator);
    }

    public function testGetPage(): void
    {
        $dom = $this->createMock(DOMDocument::class);
        $this->request->method('receivedRequest')->willReturn(true);
        $this->tool->method('getDom')->willReturn($dom);
        $this->assertEquals($dom, $this->recordCreatorPage->getPage());
    }
}
