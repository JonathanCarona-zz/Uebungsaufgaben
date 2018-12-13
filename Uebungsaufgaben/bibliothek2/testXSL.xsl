<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

    <xsl:param name="sort"/>

    <xsl:template match="/">
        <html>
            <head>
                <link rel="stylesheet" href="style.css" type="text/css" />
                <title>Competec Library</title>
            </head>
            <body>

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
                                <td><input type="text" name="createAuthor" class="createInputText" required="true"></input></td>
                            </tr>
                            <tr>
                                <td>Book title </td>
                                <td><input type="text" name="createBook" class="createInputText" required="true"></input></td>
                            </tr>
                            <tr>
                                <td>Genre</td>
                                <td><input type="text" name="createGenre" class="createInputText" required="true"></input></td>
                            </tr>
                            <tr>
                                <td>Price</td>
                                <td><input type="number" step="0.01" name="createPrice" class="createInputText" required="true"></input></td>
                            </tr>
                            <tr>
                                <td>Publishing Date </td>
                                <td><input type="date" name="createPublishDate" class="createInputText" required="true"></input></td>
                            </tr>
                            <tr>
                                <td>Description</td>
                                <td><textarea rows="20" cols="150" form="createForm" name="createDescription" required="true">No description</textarea> </td>
                            </tr>
                            <tr>
                                <td><a href="index.php"><button>Back</button></a> </td>
                                <td><input type="submit" value="Create"></input></td>
                            </tr>
                        </table>

                    </form>


                </div>
            </body>
        </html>

    </xsl:template>

</xsl:stylesheet>
