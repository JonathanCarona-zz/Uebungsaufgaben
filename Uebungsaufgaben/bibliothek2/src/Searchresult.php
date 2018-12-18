<?php


class Searchresult
{
    /** @var string */
    private $author;
    /** @var string */
    private $book;
    /** @var  */
    private $sort;
    /** @var Tool */
    private $tool;


    public function __construct(array $search, Tool $tool)
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

        if (isset($search[0]['sort'])) {
            $this->sort = $search[0]['sort'];
        } else {
            $this->sort = 'author';
        }

        $this->tool = $tool;

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
/*        $this->tool->getDom()->load('books.xml');
        $this->tool->getXsl()->load('booksXSL.xsl');
        $this->tool->getProc()->importStylesheet($this->tool->getXsl());
        $dom = $this->tool->getDom();
        $proc = $this->tool->getProc();
        $xpath = $this->tool->getXpath();*/

        $this->tool->getDom()->load('books.xml');
        $this->tool->getXsl()->load('booksXSL.xsl');
        $proc = $this->tool->getProc();
        $proc->importStylesheet($this->tool->getXsl());
        $xpath = $this->tool->addXpath($this->tool->getDom());

        if ($this->author != null) {
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

        if ($this->book != null) {
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
        $proc->setParameter('', 'sort', $this->sort);
        echo $proc->transformToXml($this->tool->getDom());
    }


}
