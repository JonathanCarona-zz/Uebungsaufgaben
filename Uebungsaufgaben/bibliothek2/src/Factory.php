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

    public function createSearchResult(array $search, Tool $tool): Searchresult
    {
        return new Searchresult($search, $tool);
    }

    public function createRecord(array $post, Tool $tool): Record
    {
        return new Record($post, $tool);
    }

    public function createTool(): Tool
    {
        $dom = $this->createDOMDocument();
        return new Tool($dom, $this->createDOMDocument(), $this->createXSLProc(), $this->createXPATH($dom));
    }
}
