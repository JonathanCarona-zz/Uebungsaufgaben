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
        $this->initializeValidRecordParameter($request);
        $this->tool = $tool;
    }

    private function initializeValidRecordParameter(Request $request): void
    {
        if ($request->hasParameter('createAuthor')) {
            $this->author = strip_tags($request->getParameter('createAuthor'));
        } elseif ($request->hasParameter('createBook')) {
            $this->title = strip_tags($request->getParameter('createBook'));
        } elseif ($request->hasParameter('createGenre')) {
            $this->genre = strip_tags($request->getParameter('createGenre'));
        } elseif ($request->hasParameter('createPrice') && is_numeric($request->getParameter('createPrice'))) {
            $this->price = strip_tags($request->getParameter('createPrice'));
        } elseif ($request->hasParameter('createPublishDate')) {
            $this->publish_date = strip_tags($request->getParameter('createPublishDate'));
        }
        $this->description = strip_tags($request->getParameter('createDescription'));

    }


    public function addRecord(): void
    {

        $dom = $this->tool->getDom();
        $dom->load('books.xml');
        $xpath = $this->tool->getXpath();

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
