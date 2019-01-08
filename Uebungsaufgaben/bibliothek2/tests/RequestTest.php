<?php

include("autoload.php");
include("/var/www/Uebungsaufgaben/Uebungsaufgaben/bibliothek2/src/autoload.php");

use PHPUnit\Framework\TestCase;

/**
 * @covers Request
 */
class RequestTest extends TestCase
{
    /** @var Request */
    private $request;

    protected function setUp()
    {
        $serverArray = array(
            'REQUEST_URI' => '/create'
        );
        $requestArray = array(
            'createAuthor' => 'Corets, Eva',
            'createNothing' => ''
        );
        $this->request = new Request($requestArray, $serverArray);
    }

    public function testGetURI(): void
    {
        $this->assertSame('/create', $this->request->getURI());
    }

    public function testGetParameter(): void
    {
        $this->assertSame('Corets, Eva', $this->request->getParameter('createAuthor'));
    }

    public function testHasParameter(): void
    {
        $this->assertTrue($this->request->hasParameter('createAuthor'));
        $this->assertFalse($this->request->hasParameter('invalid'));
        $this->assertFalse($this->request->hasParameter('createNothing'));
    }



    public function testReceivedRequest(): void
    {
        $invalidRequestArray = array(null);
        $this->assertTrue($this->request->receivedRequest());
        $invalidRequest = new Request($invalidRequestArray, $_SERVER);
        $this->assertFalse($invalidRequest->receivedRequest());
    }
}
