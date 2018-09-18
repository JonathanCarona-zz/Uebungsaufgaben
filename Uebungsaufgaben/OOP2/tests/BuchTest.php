<?php


use PHPUnit\Framework\TestCase;

require '../src/autoload.php';

class BuchTest extends TestCase
{
    private $myBook;
    private $author;
    private $email;

    protected function setUp()
    {
        $this->email = new Email('JK@gmail.com');
        $this->author = new Autor('Rowling', 'JK', $this->email);
        $this->myBook = new Buch('Harry Potter', $this->author, 2001, 987, 'Magic');
    }

    /** @dataProvider provideInvalidReleaseDates */
    public function testInvalidReleaseDateThrowsException(int $input)
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('The release year cannot be in the future');

        new Buch('Harry Potter 2', $this->author, $input, 999, 'Magic');
    }

    public function provideInvalidReleaseDates(): array
    {
        return [
            [2019],
            [2020],
            [2222.3524]
        ];
    }

    /** @dataProvider provideInvalidAmountOfPages */
    public function testInvalidAmountOfPagesThrowsException(int $input)
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('There is no book with less than 0 Pages');

        new Buch('Harry Potter', $this->author, 2000, $input, 'Magic');
    }

    public function provideInvalidAmountOfPages(): array
    {
        return [
            [-3],
            [-1000]
        ];
    }
}
