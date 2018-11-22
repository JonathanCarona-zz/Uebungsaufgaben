<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

    <xsl:template match="/">
        <html>
            <body>
        <table style="width: 100%">
            <tr>
                <th>Author</th>
                <th>Title</th>
                <th>Genre</th>
                <th>Price</th>
                <th>Publishing Date</th>
                <th>Description</th>
            </tr>
            <xsl:for-each select="catalog/book">
                <xsl:sort select="author" data-type="text" order="ascending"/>
                <xsl:sort select="title" data-type="text" order="ascending"/>
                <xsl:sort select="genre" data-type="text" order="ascending"/>
                <xsl:sort select="price" data-type="number" order="ascending"/>
                <xsl:sort select="publish_date" data-type="text" order="descending"/>
                <tr>
                    <td><xsl:value-of select="author"/></td>
                    <td><xsl:value-of select="title"/></td>
                    <td><xsl:value-of select="genre"/></td>
                    <td><xsl:value-of select="price"/></td>
                    <td><xsl:value-of select="publish_date"/></td>
                    <td ><xsl:value-of select="description"/></td>
                </tr>
            </xsl:for-each>

        </table>
            </body>
        </html>
    </xsl:template>

</xsl:stylesheet>
