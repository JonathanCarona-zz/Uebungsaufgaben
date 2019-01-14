<?php

use PHPUnit\Framework\TestCase;

/**
 * @covers Factory
 */
class FactoryTest extends TestCase
{
    /** @var Factory */
    private $factory;
    /** @var DOMDocument | PHPUnit_Framework_MockObject_MockObject */
    private $dom;
    /** @var XSLTProcessor | PHPUnit_Framework_MockObject_MockObject */
    private $XSLTProcessor;
    /** @var DOMXPath | PHPUnit_Framework_MockObject_MockObject */
    private $xpath;
    /** @var IndexPage | PHPUnit_Framework_MockObject_MockObject */
    private $indexPage;
    /** @var RecordCreatorPage | PHPUnit_Framework_MockObject_MockObject */
    private $recordCreatorPage;
    /** @var Tool | PHPUnit_Framework_MockObject_MockObject */
    private $tool;
    /** @var Renderer | PHPUnit_Framework_MockObject_MockObject */
    private $renderer;
    /** @var Request | PHPUnit_Framework_MockObject_MockObject */
    private $request;
    /** @var Router | PHPUnit_Framework_MockObject_MockObject */
    private $router;

    protected function setUp()
    {
        $this->dom = $this->createMock(DOMDocument::class);
        $this->XSLTProcessor = $this->createMock(XSLTProcessor::class);
        $this->xpath = $this->createMock(DOMXPath::class);
        $this->indexPage = $this->createMock(IndexPage::class);
        $this->recordCreatorPage = $this->createMock(RecordCreatorPage::class);
        $this->tool = $this->createMock(Tool::class);
        $this->renderer = $this->createMock(Renderer::class);
        $this->request = $this->createMock(Request::class);
        $this->router = $this->createMock(Router::class);
        $this->factory = new Factory();
    }

    public function testDomCanBeCreated(): void
    {
        $this->assertInstanceOf(DOMDocument::class, $this->factory->createDOMDocument());
    }

    public function testXSLProcCanBeCreated(): void
    {
        $this->assertInstanceOf(XSLTProcessor::class, $this->factory->createXSLProc());
    }

    public function testXPATHCanBeCreated(): void
    {
        $this->assertInstanceOf(DOMXPath::class, $this->factory->createXPATH($this->factory->createDOMDocument()));
    }

    public function testIndexPageCanBeCreated(): void
    {
        $this->assertInstanceOf(IndexPage::class, $this->factory->createIndexPage($this->request));
    }


    public function testRecordCreatorPageCanBeCreated(): void
    {
        $this->assertInstanceOf(RecordCreatorPage::class, $this->factory->createRecordCreatorPage($this->request));
    }

    public function testToolCanBeCreated(): void
    {
        $this->assertInstanceOf(Tool::class, $this->factory->createTool());
    }

    public function testRendererCanBeCreated(): void
    {
        $this->assertInstanceOf(Renderer::class, $this->factory->createRenderer($this->XSLTProcessor));

    }

    public function testRequestCanBeCreated(): void
    {
        $array = array();
        $array2 = array();
        $this->assertInstanceOf(Request::class, $this->factory->createRequest($array, $array2));
    }

    public function testRouterCanBeCreated(): void
    {
        $this->assertInstanceOf(Router::class, $this->factory->createRouter());
    }

    public function testFilterCanBeCreated(): void
    {
        $this->assertInstanceOf(Filter::class, $this->factory->createFilter());
    }

    public function testRecordCreatorCanBeCreated(): void
    {
        $this->assertInstanceOf(RecordCreator::class, $this->factory->createRecordCreator());
    }

    public function testErrorPageCanBeCreated(): void
    {
        $this->assertInstanceOf(ErrorPage::class, $this->factory->createErrorPage());
    }

}
