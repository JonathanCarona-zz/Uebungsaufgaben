<?php


class Router
{
    /** @var Factory */
    private $factory;


    public function __construct(Factory $factory)
    {
        $this->factory = $factory;
    }


    public function route(Request $request): DOMDocument
    {
        switch ($request->getURI()) {
            case '/':
                return $this->factory->createIndexPage($request)->getPage();
            case '/create':
                return $this->factory->createRecordCreatorPage($request)->getPage();
            default:
                return $this->factory->createErrorPage()->getPage();
        }
    }
}
