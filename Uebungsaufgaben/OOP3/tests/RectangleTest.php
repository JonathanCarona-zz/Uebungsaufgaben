<?php


use PHPUnit\Framework\TestCase;



/**
 * @covers Rectangle
 */
class RectangleTest extends TestCase
{
    /** @var Rectangle */
    private $myRectangle;

    protected function setUp()
    {
        $this->myRectangle = new Rectangle(10, 5);
    }

    /**
     * @dataProvider provideInvalidSideaAndbInputs
     */
    public function testInvalidSideInputs($input1, $input2)
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('The sides cannot be lower or be zero long.');

        new Rectangle($input1, $input2);
    }

    public function provideInvalidSideaAndbInputs(): array
    {
        return [
            [-5, 5],
            [6, -6],
            [-12, -12],
            [-0, 0],
            [0,10],
            [20, 0],
            [0, -10],
            [-20, 0]
        ];

    }


    public function testGetPerimeter()
    {
        $this->assertSame(30.0, $this->myRectangle->getPerimeter());
    }

    public function testGetDiagonal()
    {
        $this->assertSame(sqrt(125), $this->myRectangle->getDiagonal());
    }

    public function testGetArea()
    {
        $this->assertSame(50.0, $this->myRectangle->getArea());
    }
}
