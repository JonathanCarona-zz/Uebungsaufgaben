<?php
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
    $author = $dom->createElement('author', 'test');
    $title = $dom->createElement('title', 'test');
    $genre = $dom->createElement('genre', 'test');
    $price = $dom->createElement('price', 5.95);
    $publish_date = $dom->createElement('publish_date', '2005-12-03');
    $description = $dom->createElement('description', 'test');
    $newBook->appendChild($author);
    $newBook->appendChild($title);
    $newBook->appendChild($genre);
    $newBook->appendChild($price);
    $newBook->appendChild($publish_date);
    $newBook->appendChild($description);

    $dom->save('books.xml');



    ?>
