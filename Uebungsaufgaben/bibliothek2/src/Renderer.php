<?php


class Renderer
{
    /** @var XSLTProcessor  */
    private $proc;

    public function __construct(XSLTProcessor $proc)
    {
        $this->proc = $proc;
    }

    public function render(DOMDocument $dom): void
    {
        echo $this->proc->transformToXml($dom);
    }

    public function getProc(): XSLTProcessor
    {
        return $this->proc;
    }

}
