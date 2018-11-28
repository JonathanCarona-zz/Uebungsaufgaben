<?php

use PHPUnit\Framework\TestCase;
require '../src/autoload.php';

class PhonenumberTest extends TestCase
{
    public function testValidPhoneNumberWorks()
    {
        $input = '0765163971';

        $phoneNumber = new Phonenumber($input);

        $this->assertSame($input, (string) $phoneNumber);
    }

    /** @dataProvider provideInvalidPhoneNumbers */
    public function testInvalidPhoneNumberThrowsException(string $inputPhoneNumber)
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('The number is invalid.');

        new Phonenumber($inputPhoneNumber);
    }

    public function provideInvalidPhoneNumbers(): array
    {
        return [
            ['invalid'],
            ['999999999999999999'],
            ['-10000'],
            ['jonathan'],
        ];
    }
}
