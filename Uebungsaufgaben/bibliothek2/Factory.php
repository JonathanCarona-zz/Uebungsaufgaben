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

    public function createRecord(string $author, string $title, string $genre, float $price, string $publish_date, string $description): Record {
        return new Record($author, $title, $genre, $price, $publish_date, $description);
    }

    public function createSearch(array $search) {
        return new Searchresult($search);
    }
}
