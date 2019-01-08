<?php


class Router
{
    /** @var Factory */
    private $factory;


    public function __construct(Factory $factory)
    {
        $this->factory = $factory;
    }


    public function route(Request $request, Tool $tool): DOMDocument
    {
        switch ($request->getURI()) {
            case '/':
                return $this->factory->createIndexPage($request, $tool)->getPage();
            case '/create':
                return $this->factory->createRecordCreatorPage($request, $tool)->getPage();
            default:
                return $this->factory->createErrorPage($tool)->getPage();
        }
    }
}
