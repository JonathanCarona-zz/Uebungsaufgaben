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

    public function createSearchResult(array $search, Tool $tool): Searchresult {
        return new Searchresult($search, $tool);
    }

    public function createRecord(string $author, string $title, string $genre, float $price, string $publish_date, string $description): Record {
        return new Record($author, $title, $genre, $price, $publish_date, $description);
    }
}
