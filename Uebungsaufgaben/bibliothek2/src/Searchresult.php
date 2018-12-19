<?php


class Searchresult
{
    /** @var string */
    private $author;
    /** @var string */
    private $book;
    /** @var */
    private $sort;
    /** @var Tool */
    private $tool;



    public function __construct(Request $request, Tool $tool)
    {

        if ($request->hasRequest('searchAuthor')) {
            $this->author = $request->getRequest('searchAuthor');
        } else {
            $this->author = null;
        }

        if ($request->hasRequest('searchBook')) {
            $this->book = $request->getRequest('searchBook');
        } else {
            $this->book = null;
        }

        if ($request->hasRequest('sort')) {
            $this->sort = $request->getRequest('sort');
        } else {
            $this->sort = 'author';
        }
        $this->tool = $tool;
    }


    public function findResult(XSLTProcessor $proc): DOMDocument
    {
        $this->tool->getDom()->load('books.xml');
        $this->tool->getXsl()->load('booksXSL.xsl');
        $xpath = $this->tool->addXpath($this->tool->getDom());

        $proc->importStylesheet($this->tool->getXsl());
        $proc->setParameter('', 'sort', $this->sort);

        if ($this->author !== null) {
            $this->findAuthor($xpath);
        }

        if ($this->book !== null) {
            $this->findBook($xpath);
        }

        return $this->tool->getDom();
    }

    private function findAuthor(DOMXPath $xpath): void
    {
        $bookId = array();
        $search = $this->author;
        $elements = $xpath->query("/catalog/book[author=" . "'$search'" . "]");
        /** @var DOMElement $element */
        foreach ($elements as $element) {
            $bookId[] = $element->getAttribute('id');
        }

        $bookElements = $this->tool->getDom()->getElementsByTagName('book');
        for ($i = $bookElements->length; --$i >= 0;) {
            $book = $bookElements->item($i);
            $bookAttribute = $book->getAttribute('id');
            if (!in_array($bookAttribute, $bookId)) {
                $book->parentNode->removeChild($book);
            }
        }
    }

    private function findBook(DOMXPath $xpath): void
    {

        $bookId = array();
        $search = $this->book;
        $elements = $xpath->query("/catalog/book[title=" . "'$search'" . "]");
        /** @var DOMElement $element */
        foreach ($elements as $element) {
            $bookId[] = $element->getAttribute('id');
        }


        $bookElements = $this->tool->getDom()->getElementsByTagName('book');
        for ($i = $bookElements->length; --$i >= 0;) {
            $book = $bookElements->item($i);
            $bookAttribute = $book->getAttribute('id');
            if (!in_array($bookAttribute, $bookId)) {
                $book->parentNode->removeChild($book);
            }
        }
    }

}
