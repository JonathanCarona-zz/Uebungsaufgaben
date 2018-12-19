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
    /** @var Tool */
    private $tool;

    public function __construct(Request $request, Tool $tool)
    {
        $this->author = $request->getRequest('createAuthor');
        $this->title = $request->getRequest('createBook');
        $this->genre = $request->getRequest('createGenre');
        $this->price = $request->getRequest('createPrice');
        $this->publish_date = $request->getRequest('createPublishDate');
        $this->description = $request->getRequest('createDescription');
        $this->tool = $tool;
    }


    public function addRecord(): void
    {

        $dom = $this->tool->getDom();
        $dom->load('books.xml');
        $xpath = $this->tool->addXpath($dom);

        $lastItem = $xpath->query('//book[last()]');
        $lastItemAttribute = $lastItem->item(0)->getAttribute('id');
        preg_match_all('!\d+!', $lastItemAttribute, $matches);
        $nextId = $matches[0][0] + 1;
        $nextId = 'bk' . $nextId;

        $newBook = $dom->createElement('book');
        $newBook->setAttribute('id', $nextId);
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
}
