<?php


use PHPUnit\Framework\TestCase;

require '../src/autoload.php';

class ZipTest extends TestCase
{

    public function testZipIfZipCodeIsValid()
    {
        $zipCode = 5702;
        $myZip = new Zip($zipCode);

        $this->assertSame($zipCode, $myZip->getZip());
    }

    /** @dataProvider provideInvalidZips */
    public function testInvalidZipThrowException($input)
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('The Postcode must be a 4 digit number');

        new Zip($input);
    }

    public function provideInvalidZips(): array
    {
        return [
            [15],
            [-3],
            [999],
            [10000],
            ['banane'],
            [10005],
        ];
    }


}
