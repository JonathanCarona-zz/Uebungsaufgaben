<?php

use PHPUnit\Framework\TestCase;

/**
 * @covers RecordCreator
 */
class RecordCreatorTest extends TestCase
{
    /** @var RecordCreator */
    private $recordCreator;


    protected function setUp()
    {
        $this->recordCreator = new RecordCreator();
    }

    public function testRecordCanBeAdded(): void
    {
        /** @var PHPUnit_Framework_MockObject_MockObject | Request $request */
        $request = $this->createMock(Request::class);
        $dom = new DOMDocument();
        $dom->load(__DIR__ . '/books.xml');
        $defaultdom = new DOMDocument();
        $defaultdom->load(__DIR__ . '/books.xml');
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

        $defaultdom->save(__DIR__ . '/books.xml');
    }
}
