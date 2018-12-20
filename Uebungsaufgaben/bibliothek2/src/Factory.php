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

    public function createSearchResult(Request $request, Tool $tool): Searchresult
    {
        return new Searchresult($request, $tool);
    }

    public function createRecordCreator(Request $request, Tool $tool): RecordCreator
    {
        return new RecordCreator($request, $tool);
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

    public function createRequest(array $request): Request
    {
        return new Request($request);
    }
}
