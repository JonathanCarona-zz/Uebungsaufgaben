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


    public function __construct(DOMDocument $dom, DOMDocument $xsl, XSLTProcessor $proc, DOMXPath $xpath)
    {
        $this->dom = $dom;
        $this->xsl = $xsl;
        $this->proc = $proc;
        $this->xpath = $xpath;
    }

    public function getDom(): DOMDocument
    {
        return $this->dom;
    }

    public function getXsl(): DOMDocument
    {
        return $this->xsl;
    }

    public function getProc(): XSLTProcessor
    {
        return $this->proc;
    }

    public function getXpath(): DOMXPath
    {
        return $this->xpath;
    }

    public function addXpath(DOMDocument $dom)
    {
        return new DOMXPath($dom);
    }

}
