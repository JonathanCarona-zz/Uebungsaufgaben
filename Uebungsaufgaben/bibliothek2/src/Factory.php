<?php


class Factory
{
    private $tool;

    public function createDOMDocument(): DOMDocument
    {
        return new DOMDocument();
    }

    public function createXSLProc(): XSLTProcessor
    {
        return new XSLTProcessor();
    }

    public function createXPATH(DOMDocument $dom): DOMXPath
    {
        return new DOMXPath($dom);
    }

    public function createIndexPage(Request $request): Page
    {
        return new IndexPage($request, $this->createTool(), $this->createFilter());
    }

    public function createRecordCreatorPage(Request $request): Page
    {
        return new RecordCreatorPage($request, $this->createTool(), $this->createRecordCreator());
    }

    public function createTool(): Tool
    {
        if ($this->tool === null) {
            $dom = $this->createDOMDocument();
            $this->tool = new Tool($dom, $this->createDOMDocument(), $this->createXSLProc(), $this);
        }

        return $this->tool;
    }

    public function createRenderer(XSLTProcessor $proc): Renderer
    {
        return new Renderer($proc);
    }

    public function createRequest(array $request, array $server): Request
    {
        return new Request($request, $server);
    }

    public function createRouter(): Router
    {
        return new Router($this);
    }

    public function createFilter(): Filter
    {
        return new Filter();
    }

    public function createRecordCreator(): RecordCreator
    {
        return new RecordCreator();
    }

    public function createErrorPage(): Page
    {
        return new ErrorPage($this->createTool());
    }
}
