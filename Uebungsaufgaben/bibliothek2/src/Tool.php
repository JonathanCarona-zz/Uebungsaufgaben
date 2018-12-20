<?php
include "autoload.php";


class Tool
{
    /** @var DOMDocument */
    private $dom;
    /** @var DOMDocument */
    private $xsl;
    /** @var XSLTProcessor */
    private $proc;
    /** @var DOMXPath */
    private $xpath;


    public function __construct(DOMDocument $dom, DOMDocument $xsl, XSLTProcessor $proc, Factory $factory)
    {
        $this->dom = $dom;
        $this->dom->load('books.xml');
        $this->xpath = $factory->createXPATH($this->dom);
        $this->xsl = $xsl;
        $this->proc = $proc;
    }

    public function getXpath(): DOMXPath
    {
        return $this->xpath;
    }



    public function getDom(): DOMDocument
    {
        return $this->dom;
    }

    public function getXsl(): DOMDocument
    {
        return $this->xsl;
    }

    public function getXSLTProcessor(): XSLTProcessor
    {
        return $this->proc;
    }


}
