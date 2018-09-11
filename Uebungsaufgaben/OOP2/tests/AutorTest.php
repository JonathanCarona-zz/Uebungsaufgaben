<?php


use PHPUnit\Framework\TestCase;
require 'autoload.php';

class AutorTest extends TestCase
{
    /** @var Autor */
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
