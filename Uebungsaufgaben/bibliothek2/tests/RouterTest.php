<?php

use PHPUnit\Framework\TestCase;

/**
 * @covers Router
 */

class RouterTest extends TestCase
{
    /** @var Router */
    private $router;
    /** @var Factory | PHPUnit_Framework_MockObject_MockObject */
    private $factory;
    /** @var Request | \PHPUnit_Framework_MockObject_MockObject */
    private $request;
    /** @var Tool */
    private $tool;
    /** @var IndexPage | PHPUnit_Framework_MockObject_MockObject */
    private $indexPage;
    /** @var RecordCreatorPage | PHPUnit_Framework_MockObject_MockObject */
    private $recordCreatorPage;
    /** @var DOMDocument | PHPUnit_Framework_MockObject_MockObject */
    private $dom;
    /** @var DOMDocument | PHPUnit_Framework_MockObject_MockObject */
    private $recordCreatorDom;
    /** @var ErrorPage | PHPUnit_Framework_MockObject_MockObject */
    private $errorPage;
    /** @var DOMDocument | PHPUnit_Framework_MockObject_MockObject */
    private $errorDom;

    protected function setUp()
    {
        $this->factory = $this->createMock(Factory::class);
        $this->request = $this->createMock(Request::class);
        $this->tool = $this->createMock(Tool::class);
        $this->indexPage = $this->createMock(IndexPage::class);
        $this->dom = $this->createMock(DOMDocument::class);
        $this->recordCreatorPage = $this->createMock(RecordCreatorPage::class);
        $this->recordCreatorDom =$this->createMock(DOMDocument::class);
        $this->errorPage = $this->createMock(ErrorPage::class);
        $this->errorDom = $this->createMock(DOMDocument::class);
        $this->router = new Router($this->factory);
    }

    public function testRoute(): void {
        $this->request->method('getURI')->willReturnOnConsecutiveCalls(
            '/',
            '/create',
            '/something'
        );
        $this->factory->method('createIndexPage')->willReturn($this->indexPage);
        $this->indexPage->method('getPage')->willReturn($this->dom);
        $this->assertEquals($this->dom, $this->router->route($this->request, $this->tool));
        $this->factory->method('createRecordCreatorPage')->willReturn($this->recordCreatorPage);
        $this->recordCreatorPage->method('getPage')->willReturn($this->recordCreatorDom);
        $this->assertEquals($this->recordCreatorDom, $this->router->route($this->request, $this->tool));
        $this->factory->method('createErrorPage')->willReturn($this->errorPage);
        $this->errorPage->method('getPage')->willReturn($this->errorDom);
        $this->assertEquals($this->errorDom, $this->router->route($this->request, $this->tool));



    }


}
