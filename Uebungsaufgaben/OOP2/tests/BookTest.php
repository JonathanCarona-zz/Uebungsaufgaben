<?php


use PHPUnit\Framework\TestCase;

/**
 * @covers Book
 */
class BookTest extends TestCase
{
    /** @var Book */
    private $myBook;
    /** @var PHPUnit_Framework_MockObject_MockObject|Author */
    private $author;

    protected function setUp()
    {
        $this->author = $this->createMock(Author::class);
        $this->myBook = new Book('Harry Potter', $this->author, 2001, 987, 'Magic');
    }

    public function testAllGettersCanBeExecuted()
    {
        $this->assertSame('Harry Potter', $this->myBook->getTitle());
        $this->assertSame(2001, $this->myBook->getReleaseYear());
        $this->assertSame(987, $this->myBook->getAmountOfPages());
        $this->assertSame($this->author, $this->myBook->getAuthor());
        $this->assertSame('Magic', $this->myBook->getGenre());
    }

    /** @dataProvider provideInvalidReleaseDates */
    public function testInvalidReleaseDateThrowsException(int $input)
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('The release year cannot be in the future');

        new Book('Harry Potter 2', $this->author, $input, 999, 'Magic');
    }

    public function provideInvalidReleaseDates(): array
    {
        return [
            [2019],
            [2020],
            [2222.3524],
        ];
    }

    /** @dataProvider provideInvalidAmountOfPages */
    public function testInvalidAmountOfPagesThrowsException(int $input)
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('There is no book with or less than 0 Pages');

        new Book('Harry Potter', $this->author, 2000, $input, 'Magic');
    }

    public function provideInvalidAmountOfPages(): array
    {
        return [
            [-3],
            [-1000]
        ];
    }

    public function testGetEmailAddressOfTheAuthorWorks()
    {
        $expectedEmail = $this->createMock(Email::class);

        $this->author
            ->expects($this->once())
            ->method('getEmail')
            ->willReturn($expectedEmail);

        $this->assertSame($expectedEmail, $this->myBook->getEmailAddressOfTheAuthor());
    }
}
