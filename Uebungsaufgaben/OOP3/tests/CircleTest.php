<?php


use PHPUnit\Framework\TestCase;




/**
 *@covers Circle
 */
class CircleTest extends TestCase
{
    /** @var Circle */
    private $myCircle;

    protected function setUp()
    {
        $this->myCircle = new Circle(10);
    }

    /** @dataProvider provideInvalidRadiusInputs */
    public function testInvalidSideInputs(float $input)
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('The radius cannot be lower or be zero long.');

        new Circle($input);
    }

    public function provideInvalidRadiusInputs(): array
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
        $this->assertSame(20 * pi(), $this->myCircle->getPerimeter());
    }

    public function testGetDiagonal()
    {
        $this->assertSame(20.0, $this->myCircle->getDiagonal());
    }

    public function testGetArea()
    {
        $this->assertSame(100 * pi(), $this->myCircle->getArea());
    }

}
