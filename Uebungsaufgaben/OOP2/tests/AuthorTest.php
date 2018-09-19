<?php


use PHPUnit\Framework\TestCase;

require '../src/autoload.php';

/**
 * @covers Author
 */
class AuthorTest extends TestCase
{
    /** @var Author */
    private $stephenKing;

    /** @var PHPUnit_Framework_MockObject_MockObject|Email */
    private $email;

    protected function setUp()
    {
        $this->email = $this->createMock(Email::class);
        $this->stephenKing = new Author('King', 'Stephen', $this->email);

    }



    public function testCanExecuteGetters()
    {
        $this->assertSame('Stephen', $this->stephenKing->getFirstName());
        $this->assertSame('King', $this->stephenKing->getLastName());
        $this->assertSame($this->email, $this->stephenKing->getEmail());
    }


    public function testToString()
    {
        $this->assertSame('Stephen King', (string)$this->stephenKing);
    }
}
