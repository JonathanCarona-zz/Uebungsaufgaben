<?php


use PHPUnit\Framework\TestCase;

/** @covers IniFileParser */
class IniFileParserTest extends TestCase
{
    /** @var IniFileParser */
    private $iniFileParser;

    protected function setUp()
    {
        $this->iniFileParser = new IniFileParser('/home/dev/PhpstormProjects/Uebungsaufgaben/OOP4/tests/TestConfiguration.ini');
    }

    public function testIniFilesCanBeParsed()
    {
        $arrayTest = array(
            'test' => 'test'
        );
        $this->assertEquals($arrayTest, $this->iniFileParser->parse()['test']);
    }
}
