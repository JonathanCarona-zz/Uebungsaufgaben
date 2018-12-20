<?php


class Renderer
{
    /** @var XSLTProcessor  */
    private $proc;

    public function __construct(XSLTProcessor $proc)
    {
        $this->proc = $proc;
    }

    public function render(DOMDocument $dom): string
    {
        return $this->proc->transformToXml($dom);
    }

    public function getProc(): XSLTProcessor
    {
        return $this->proc;
    }



}
