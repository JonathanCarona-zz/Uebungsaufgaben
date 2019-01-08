<?php

use PHPUnit\Framework\TestCase;

/**
 * @covers RecordCreator
 */
class RecordCreatorTest extends TestCase
{
    /** @var RecordCreator */
    private $recordCreator;

    /** @var string */
    private $originalXml;


    protected function setUp()
    {
        $this->recordCreator = new RecordCreator();
        $this->originalXml = file_get_contents(__DIR__ . '/books.xml');
    }

    protected function tearDown()
    {
        file_put_contents(__DIR__ . '/books.xml', $this->originalXml);
    }

    public function testRecordCanBeAdded(): void
    {
        /** @var PHPUnit_Framework_MockObject_MockObject | Request $request */
        $request = $this->createMock(Request::class);
        $dom = new DOMDocument();
        $dom->load(__DIR__ . '/books.xml');
        $xpath = new DOMXPath($dom);
        $request->method('hasParameter')->willReturn(true);
        $request->method('getParameter')->willReturnOnConsecutiveCalls(
            'Randall, Cynthia',
            'Lover Birds',
            'Romance',
            '4.95',
            '4.95',
            '2000-09-02',
            'When Carla meets Paul at an ornithologyconference'
        );

        $this->recordCreator->addRecord($request, $dom, $xpath);
        $this->assertXmlStringEqualsXmlFile(
            __DIR__ . '/expectedRecord.xml',
            $dom->saveXML()
        );
    }
}
