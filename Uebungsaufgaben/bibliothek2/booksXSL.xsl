<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

    <xsl:param name="sort"/>

    <xsl:template match="/">
        <html>
            <body>
        <table style="width: 100%">
            <tr>
                <th >Author</th>
                <th>Title</th>
                <th>Genre</th>
                <th>Price</th>
                <th>Publishing Date</th>
                <th>Description</th>
            </tr>
            <xsl:choose>
                <xsl:when test="($sort != 'low') and ($sort != 'high')">
                    <xsl:for-each select="catalog/book">
                    <xsl:sort select="*[name()=$sort]" data-type="text" order="ascending"/>
                    <tr>
                        <td><xsl:value-of select="author"/></td>
                        <td><xsl:value-of select="title"/></td>
                        <td><xsl:value-of select="genre"/></td>
                        <td><xsl:value-of select="price"/></td>
                        <td><xsl:value-of select="publish_date"/></td>
                        <td><xsl:value-of select="description"/></td>
                    </tr>
                </xsl:for-each>
                </xsl:when>
                <xsl:when test="$sort = 'low'">
                    <xsl:for-each select="catalog/book">
                        <xsl:sort select="price" data-type="number" order="ascending"/>
                        <tr>
                            <td><xsl:value-of select="author"/></td>
                            <td><xsl:value-of select="title"/></td>
                            <td><xsl:value-of select="genre"/></td>
                            <td><xsl:value-of select="price"/></td>
                            <td><xsl:value-of select="publish_date"/></td>
                            <td><xsl:value-of select="description"/></td>
                        </tr>
                    </xsl:for-each>
                </xsl:when>
                <xsl:when test="$sort = 'high'">
                    <xsl:for-each select="catalog/book">
                        <xsl:sort select="price" data-type="number" order="descending"/>
                        <tr>
                            <td><xsl:value-of select="author"/></td>
                            <td><xsl:value-of select="title"/></td>
                            <td><xsl:value-of select="genre"/></td>
                            <td><xsl:value-of select="price"/></td>
                            <td><xsl:value-of select="publish_date"/></td>
                            <td><xsl:value-of select="description"/></td>
                        </tr>
                    </xsl:for-each>
                </xsl:when>
            </xsl:choose>

        </table>
            </body>
        </html>
    </xsl:template>

</xsl:stylesheet>
