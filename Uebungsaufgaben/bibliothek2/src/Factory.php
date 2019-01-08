<?php


class Factory
{
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

    public function createIndexPage(Request $request, Tool $tool): IndexPage
    {
        return new IndexPage($request, $tool, $this->createFilter());
    }

    public function createRecordCreatorPage(Request $request, Tool $tool): RecordCreatorPage
    {
        return new RecordCreatorPage($request, $tool, $this->createRecordCreator());
    }

    public function createTool(): Tool
    {
        $dom = $this->createDOMDocument();
        return new Tool($dom, $this->createDOMDocument(), $this->createXSLProc(), $this);
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

    public function createErrorPage(Tool $tool): ErrorPage
    {
        return new ErrorPage($tool);
    }
}
