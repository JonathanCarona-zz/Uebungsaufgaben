<?php


class Tool
{
    /** @var DOMDocument $dom */
    private $dom;
    /** @var DOMDocument $xsl */
    private $xsl;
    /** @var XSLTProcessor $proc */
    private $proc;
    /** @var DOMXPath $xpath */
    private $xpath;


    public function __construct(Factory $factory)
    {
        $this->dom = $factory->createDOMDocument();
        $this->xsl = $factory->createDOMDocument();
        $this->proc = $factory->createXSLProc();
        $this->xpath = $factory->createXPATH($this->dom);
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
}
