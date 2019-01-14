<?php


class Filter
{
    /** @var string */
    private $author = null;
    /** @var string */
    private $book = null;
    /** @var */
    private $sort = 'author';



    public function filter(DOMDocument $dom, Request $request, DOMXPath $xpath, XSLTProcessor $XSLTProcessor): void
    {
        $this->initializeNotNullParameter($request);
        $XSLTProcessor->setParameter('', 'sort', $this->sort);

        if ($this->author !== null) {
            $this->findAuthor($xpath, $dom);
        }

        if ($this->book !== null) {
            $this->findBook($xpath, $dom);
        }

    }

    private function initializeNotNullParameter(Request $request): void
    {
        if ($request->hasParameter('searchAuthor')) {
            $this->author = $request->getParameter('searchAuthor');
        }

        if ($request->hasParameter('searchBook')) {
            $this->book = $request->getParameter('searchBook');
        }

        if ($request->hasParameter('sort')) {
            $this->sort = $request->getParameter('sort');
        }
    }

    private function findAuthor(DOMXPath $xpath, DOMDocument $dom): void
    {
        $bookId = array();
        $search = $this->author;
        $elements = $xpath->query("/catalog/book[author=" . "'$search'" . "]");
        /** @var DOMElement $element */
        foreach ($elements as $element) {
            $bookId[] = $element->getAttribute('id');
        }

        $bookElements = $dom->getElementsByTagName('book');
        for ($i = $bookElements->length; --$i >= 0;) {
            $book = $bookElements->item($i);
            $bookAttribute = $book->getAttribute('id');
            if (!in_array($bookAttribute, $bookId, true)) {
                $book->parentNode->removeChild($book);
            }
        }
    }

    private function findBook(DOMXPath $xpath, DOMDocument $dom): void
    {
        $bookId = array();
        $search = $this->book;
        $elements = $xpath->query("/catalog/book[title=" . "'$search'" . "]");
        /** @var DOMElement $element */
        foreach ($elements as $element) {
            $bookId[] = $element->getAttribute('id');
        }


        $bookElements = $dom->getElementsByTagName('book');
        for ($i = $bookElements->length; --$i >= 0;) {
            $book = $bookElements->item($i);
            $bookAttribute = $book->getAttribute('id');
            if (!in_array($bookAttribute, $bookId, true)) {
                $book->parentNode->removeChild($book);
            }
        }
    }

    /**
     * Filter constructor.
     */
    public function __construct()
    {
    }


}
