<?php


class IndexPage implements Page
{
    /** @var Tool */
    private $tool;
    /** @var DOMDocument */
    private $dom;
    /** @var Filter */
    private $filter;
    /** @var Request */
    private $request;



    public function __construct(Request $request, Tool $tool, Filter $filter)
    {
        $this->filter = $filter;
        $this->request = $request;
        $this->tool = $tool;
        $this->dom = $tool->getDom();
        $this->tool->getXsl()->load(__DIR__ . '/booksXSL.xsl');
        $this->tool->getXSLTProcessor()->importStylesheet($this->tool->getXsl());
    }

    public function getPage(): DOMDocument
    {
        if ($this->request->receivedRequest()) {
            $this->filter->filter($this->dom, $this->request, $this->tool->getXpath(), $this->tool->getXSLTProcessor());
        }
        return $this->tool->getDom();
    }




}
