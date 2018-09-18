<?php


use PHPUnit\Framework\TestCase;
require '../src/autoload.php';

class EmailTest extends TestCase
{
    private $email;

    protected function setUp()
    {
        $this->email = new Email('jonathancarona@outlook.com');

    }


    /** @dataProvider provideInvalidEmails*/
    public function testInvalidEmailsThrowsException(string $input)
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage($input . ' is not valid');

        new Email($input);
    }

    public function provideInvalidEmails(): array
    {
        return [
            ['jonathancarona@outlookcom'],
            ['jcoutlook.com'],
            ['@.com']
        ];
    }


}
