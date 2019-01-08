<?php


class ErrorPage implements Page
{
    /** @var Tool */
    private $tool;
    /** @var DOMDocument */
    private $dom;


    public function __construct(Tool $tool)
    {
        $this->tool = $tool;
        $this->dom = $tool->getDom();
        $this->tool->getXsl()->load('/var/www/Uebungsaufgaben/Uebungsaufgaben/bibliothek2/src/error.xsl');
        $this->tool->getXSLTProcessor()->importStylesheet($this->tool->getXsl());
    }

    public function getPage(): DOMDocument
    {
        return $this->tool->getDom();
    }
}
