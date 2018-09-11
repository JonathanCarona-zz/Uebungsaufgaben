<?php


use PHPUnit\Framework\TestCase;


class AutorTest extends TestCase
{
    private $stephenKing;

    protected function setUp()
    {
        $stephenKingMail = new Email('StephenKing@example.com');
        $this->stephenKing = new Autor('King', 'Stephen', $stephenKingMail);

    }

    public function testAutorCanExecuteAMethod()
    {
        $this->assertSame('Stephen', $this->stephenKing->getVorName());
    }


}
