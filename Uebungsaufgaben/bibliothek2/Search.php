<html>
<head>
    <link rel="stylesheet" href="style.css" type="text/css" />
    <title>Competec Library</title>
</head>
</html>

<div id="header">

    <table style="width:100%">
        <tr>
            <td id="title"><a href="index.php" style="text-decoration: none; color : #000000">COMPETEC LIBRARY</a></td>
            <td style="font-size: 25px"><a href="index.php" style="text-decoration: none; color : #000000">Home</a></td>
            <td style="font-size: 25px">Books</td>
            <td style="font-size: 25px">Contact</td>
            <td style="font-size: 25px">FAQ</td>
        </tr>
    </table>
</div>
<div id="create">

    <form action="" method="POST" id="createForm">
        <table width="100%" style="font-size: 30px">
            <tr>
                <td>Author</td>
                <td><input type="text" name="createAuthor" class="createInputText" required></td>
            </tr>
            <tr>
                <td>Book title </td>
                <td><input type="text" name="createBook" class="createInputText" required></td>
            </tr>
            <tr>
                <td>Genre</td>
                <td><input type="text" name="createGenre" class="createInputText" required> </td>
            </tr>
            <tr>
                <td>Price</td>
                <td><input type="number" step="0.01" name="createPrice" class="createInputText" required> </td>
            </tr>
            <tr>
                <td>Publishing Date </td>
                <td><input type="date" name="createPublishDate" class="createInputText" required></td>
            </tr>
            <tr>
                <td>Description</td>
                <td><textarea rows="20" cols="150" form="createForm" name="createDescription" required>No description</textarea> </td>
            </tr>
            <tr>
                <td><a href="index.php"><button>Back</button></a> </td>
                <td><input type="submit" value="Create""></td>
            </tr>
        </table>

    </form>
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


</div>
