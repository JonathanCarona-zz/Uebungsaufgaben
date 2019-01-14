<?php


class RecordCreator
{
    /** @var string */
    private $author;
    /** @var string */
    private $title;
    /** @var string */
    private $genre;
    /** @var double */
    private $price;
    /** @var string */
    private $publish_date;
    /** @var string */
    private $description;

    /**
     * RecordCreator constructor.
     */
    public function __construct()
    {
    }


    public function addRecord(Request $request, DOMDocument $dom, DOMXPath $xpath): void
    {
        $this->initializeValidRecordParameter($request);

        $newBook = $dom->createElement('book');
        $newBook->setAttribute('id', $this->getNextID($xpath));
        $dom->documentElement->appendChild($newBook);
        $author = $dom->createElement('author', $this->author);
        $title = $dom->createElement('title', $this->title);
        $genre = $dom->createElement('genre', $this->genre);
        $price = $dom->createElement('price', $this->price);
        $publish_date = $dom->createElement('publish_date', $this->publish_date);
        $description = $dom->createElement('description', $this->description);
        $newBook->appendChild($author);
        $newBook->appendChild($title);
        $newBook->appendChild($genre);
        $newBook->appendChild($price);
        $newBook->appendChild($publish_date);
        $newBook->appendChild($description);


        $dom->save('books.xml');
    }

    private function initializeValidRecordParameter(Request $request): void
    {
        if ($request->hasParameter('createAuthor')) {
            $this->author = strip_tags($request->getParameter('createAuthor'));
        }
        if ($request->hasParameter('createBook')) {
            $this->title = strip_tags($request->getParameter('createBook'));
        }
        if ($request->hasParameter('createGenre')) {
            $this->genre = strip_tags($request->getParameter('createGenre'));
        }
        if ($request->hasParameter('createPrice') && is_numeric($request->getParameter('createPrice'))) {
            $this->price = strip_tags($request->getParameter('createPrice'));
        }
        if ($request->hasParameter('createPublishDate')) {
            $this->publish_date = strip_tags($request->getParameter('createPublishDate'));
        }
        $this->description = strip_tags($request->getParameter('createDescription'));
    }

    private function getNextID(DOMXPath $xpath): string
    {
        $lastItem = $xpath->query('//book[last()]');
        $lastItemAttribute = $lastItem->item(0)->getAttribute('id');
        preg_match_all('!\d+!', $lastItemAttribute, $matches);
        $nextId = $matches[0][0] + 1;
        $nextId = 'bk' . $nextId;
        return $nextId;
    }

}
