<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

    <xsl:param name="sort"/>

    <xsl:template match="/">
        <html>
            <head>
                <title>Competec Library</title>
                <link rel="stylesheet" href="style.css"/>
            </head>
            <body>
                <div id="header">

                    <table>
                        <tr>
                            <td>
                                <a id="title" href="index.php">COMPETEC LIBRARY</a>
                            </td>
                            <td>
                                <a class="navigation" href="index.php">Home</a>
                            </td>
                            <td class="navigation">Books</td>
                            <td class="navigation">Contact</td>
                            <td class="navigation">FAQ</td>
                        </tr>
                    </table>
                </div>

                <div id="content">
                    <div id="search">
                        <form id="searchForm" action="index.php" method="POST">
                            Author:
                            <input type="text" name="searchAuthor"></input>
                            Book title:
                            <input type="text" name="searchBook"></input>
                            Sort by:
                            <select name="sort" onchange="this.form.submit()">
                                <option value="author">Author</option>
                                <option value="title">Title</option>
                                <option value="genre">Genre</option>
                                <option value="low">Lowest Price</option>
                                <option value="high">Highest Price</option>
                                <option value="publish_date">Publishing Date</option>
                            </select>
                            <input name="searchForm" type="submit" value="search"></input>
                        </form>
                        <button onclick="window.location.href='Create.php'">Create new record</button>
                    </div>
                    <div id="result">
                        <table>
                            <tr>
                                <th style="width: 15%">Author</th>
                                <th style="width: 20%">Title</th>
                                <th style="width: 10%">Genre</th>
                                <th style="width: 10%">Price</th>
                                <th style="width: 10%">Publishing Date</th>
                                <th style="width: 35%">Description</th>
                            </tr>
                            <xsl:choose>
                                <xsl:when test="($sort != 'low') and ($sort != 'high')">
                                    <xsl:for-each select="catalog/book">
                                        <xsl:sort select="*[name()=$sort]" data-type="text" order="ascending"/>
                                        <tr>
                                            <td>
                                                <xsl:value-of select="author"/>
                                            </td>
                                            <td>
                                                <xsl:value-of select="title"/>
                                            </td>
                                            <td>
                                                <xsl:value-of select="genre"/>
                                            </td>
                                            <td>
                                                <xsl:value-of select="price"/>
                                            </td>
                                            <td>
                                                <xsl:value-of select="publish_date"/>
                                            </td>
                                            <td>
                                                <xsl:value-of select="description"/>
                                            </td>
                                        </tr>
                                    </xsl:for-each>
                                </xsl:when>
                                <xsl:when test="$sort = 'low'">
                                    <xsl:for-each select="catalog/book">
                                        <xsl:sort select="price" data-type="number" order="ascending"/>
                                        <tr>
                                            <td>
                                                <xsl:value-of select="author"/>
                                            </td>
                                            <td>
                                                <xsl:value-of select="title"/>
                                            </td>
                                            <td>
                                                <xsl:value-of select="genre"/>
                                            </td>
                                            <td>
                                                <xsl:value-of select="price"/>
                                            </td>
                                            <td>
                                                <xsl:value-of select="publish_date"/>
                                            </td>
                                            <td>
                                                <xsl:value-of select="description"/>
                                            </td>
                                        </tr>
                                    </xsl:for-each>
                                </xsl:when>
                                <xsl:when test="$sort = 'high'">
                                    <xsl:for-each select="catalog/book">
                                        <xsl:sort select="price" data-type="number" order="descending"/>
                                        <tr>
                                            <td>
                                                <xsl:value-of select="author"/>
                                            </td>
                                            <td>
                                                <xsl:value-of select="title"/>
                                            </td>
                                            <td>
                                                <xsl:value-of select="genre"/>
                                            </td>
                                            <td>
                                                <xsl:value-of select="price"/>
                                            </td>
                                            <td>
                                                <xsl:value-of select="publish_date"/>
                                            </td>
                                            <td>
                                                <xsl:value-of select="description"/>
                                            </td>
                                        </tr>
                                    </xsl:for-each>
                                </xsl:when>
                            </xsl:choose>

                        </table>
                    </div>
                </div>
            </body>
        </html>
    </xsl:template>

</xsl:stylesheet>
