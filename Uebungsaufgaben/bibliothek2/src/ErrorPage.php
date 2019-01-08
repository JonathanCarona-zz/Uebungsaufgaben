<?php


class ErrorPage implements Page
{
    /** @var Tool */
    private $tool;

    public function __construct(Tool $tool)
    {
        $this->tool = $tool;
        $this->tool->getXsl()->load(__DIR__.'/error.xsl');
        $this->tool->getXSLTProcessor()->importStylesheet($this->tool->getXsl());
    }

    public function getPage(): DOMDocument
    {
        return $this->tool->getDom();
    }
}
