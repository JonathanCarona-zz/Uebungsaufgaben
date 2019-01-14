<?php


class RecordCreatorPage implements Page
{

    /** @var Tool */
    private $tool;
    /** @var Request */
    private $request;
    /**
     * @var RecordCreator
     */
    private $recordCreator;

    public function __construct(Request $request, Tool $tool, RecordCreator $recordCreator)
    {
        $this->request = $request;
        $this->tool = $tool;
        $this->tool->getXsl()->load(__DIR__ .'/createXSL.xsl');
        $this->tool->getXSLTProcessor()->importStylesheet($this->tool->getXsl());
        $this->recordCreator = $recordCreator;
    }

    public function getPage(): DOMDocument
    {
        if ($this->request->receivedRequest()) {
            $this->recordCreator->addRecord($this->request, $this->tool->getDom(), $this->tool->getXpath());
        }
        return $this->tool->getDom();
    }



}
