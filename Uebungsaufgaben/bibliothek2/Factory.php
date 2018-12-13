<?php


class Factory
{
    public function createDOMDocument(): DOMDocument {
        return new DOMDocument();
    }

    public function createXSLProc(): XSLTProcessor {
        return new XSLTProcessor();
    }

    public function createXPATH(DOMDocument $dom): DOMXPath {
        return new DOMXPath($dom);
    }

    public function createSearchResult($search): Searchresult {
        return new Searchresult($search);
    }

    public function createRecord(): Record {
        return new Record();
    }
}
