<?php
$dom = new DOMDocument();
$dom->load('books.xml');
$xpath = new DOMXPath($dom);
if (isset($_POST) && $_POST != NULL) {
    $dom = new DOMDocument();
    $dom->load('books.xml');
    $xpath = new DOMXPath($dom);


    $lastItem = $xpath->query('//book[last()]');
    $lastItemAttribute = $lastItem->item(0)->getAttribute('id');
    preg_match_all('!\d+!', $lastItemAttribute, $matches);
    $nextId = $matches[0][0] + 1;
    $nextId = 'bk' . $nextId;

    $newBook = $dom->createElement('book');
    $newBook->setAttribute('id', $nextId);
    $dom->documentElement->appendChild($newBook);
    $author = $dom->createElement('author', $_POST['createAuthor']);
    $title = $dom->createElement('title', $_POST['createBook']);
    $genre = $dom->createElement('genre', $_POST['createGenre']);
    $price = $dom->createElement('price', $_POST['createPrice']);
    $publish_date = $dom->createElement('publish_date', $_POST['createPublishDate']);
    $description = $dom->createElement('description', $_POST['createDescription']);
    $newBook->appendChild($author);
    $newBook->appendChild($title);
    $newBook->appendChild($genre);
    $newBook->appendChild($price);
    $newBook->appendChild($publish_date);
    $newBook->appendChild($description);

    $dom->save('books.xml');
}
?>
