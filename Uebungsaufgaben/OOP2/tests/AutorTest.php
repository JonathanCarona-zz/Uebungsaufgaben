<?php


use PHPUnit\Framework\TestCase;

require '../src/autoload.php';

class AutorTest extends TestCase
{
    /** @var Autor */
    private $stephenKing;

    protected function setUp()
    {
        $stephenKingMail = new Email('StephenKing@example.com');
        $this->stephenKing = new Autor('King', 'Stephen', $stephenKingMail);
    }

    public function testCanExecuteMethod()
    {
        $this->assertSame('Stephen', $this->stephenKing->getVorName());
    }

    public function testEmailCanBeLeftBlank()
    {
        $anotherStephenKing = new Autor('King', 'Stephen');
        $this->assertSame('No Email', $anotherStephenKing->getEmail());
    }

    public function testToString()
    {
        $this->assertSame('Stephen King', (string)$this->stephenKing);
    }


}
