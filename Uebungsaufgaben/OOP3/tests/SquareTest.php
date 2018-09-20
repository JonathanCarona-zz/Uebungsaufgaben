<?php


use PHPUnit\Framework\TestCase;



/**
 * @covers Square
 */
class SquareTest extends TestCase
{
    /** @var Square */
    private $mySquare;

    protected function setUp()
    {
        $this->mySquare = new Square(10);
    }

    /** @dataProvider provideInvalidSideInputs */
    public function testInvalidSideInputs($input)
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage(sprintf('The side A "%s" cannot be lower or be zero long.', $input));

        new Square($input);
    }

    public function provideInvalidSideInputs(): array
    {
        return [
            [-5],
            [-6],
            [-12],
            [-0],
            [0],
            [-10],
            [-20]
        ];

    }

    public function testGetPerimeter()
    {
        $this->assertSame(40.0, $this->mySquare->getPerimeter());
    }

    public function testGetDiagonal()
    {
        $this->assertSame(sqrt(200), $this->mySquare->getDiagonal());
    }

    public function testGetArea()
    {
        $this->assertSame(100.0, $this->mySquare->getArea());
    }

}
