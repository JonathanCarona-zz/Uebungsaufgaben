<?php


class Searchresult
{
    /** @var string */
    private $author;
    /** @var string */
    private $book;
    /** @var  */
    private $sort;


    public function __construct(array $search)
    {

        if (isset($search[0]['searchAuthor'])) {
            $this->author = $search[0]['searchAuthor'];

        }  else {
            $this->author = null;
        }

        if (isset($search[0]['searchBook'])) {
            $this->book = $search[0]['searchBook'];
        }  else {
            $this->book = null;
        }

        $this->sort = $search[0]['sort'];
    }


    public function getAuthor(): string
    {
        return $this->author;
    }

    public function getBook(): string
    {
        return $this->book;
    }


    public function showResult(): void
    {
        $dom = new DOMDocument();
        $dom->load('books.xml');
        $xsl = new DOMDocument();
        $xsl->load('booksXSL.xsl');
        $proc = new XSLTProcessor();
        $proc->importStylesheet($xsl);
        $xpath = new DOMXPath($dom);

        if ($this->author != null) {

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
                if (!in_array($bookAttribute, $bookId)) {
                    $book->parentNode->removeChild($book);
                }
            }
        }

        if ($this->book != null) {
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
                if (!in_array($bookAttribute, $bookId)) {
                    $book->parentNode->removeChild($book);
                }
            }
        }

        $proc->setParameter('', 'sort', $_POST['sort']);


        echo $proc->transformToXml($dom);
    }


}
