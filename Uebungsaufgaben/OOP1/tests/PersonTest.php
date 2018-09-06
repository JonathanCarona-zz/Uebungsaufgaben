<?php

use PHPUnit\Framework\TestCase;

require '../src/autoload.php';

class PersonTest extends TestCase
{
    /** @var Person */
    private $person;

    protected function setUp()
    {
        $date = DateTime::createFromFormat("Y-m-d", "2001-05-19");
        $phonenumber = new Phonenumber("0765163971");
        $zip = new Zip(5702);

        $this->person = new Person(
            "Carona",
            "Jonathan",
            "Boellistrasse 11",
            $zip,
            "Niederlenz",
            $date,
            $phonenumber,
            "Tuerkis"
        );
    }
    public function testFavoriteColorCanBeAsked()
    {
        $this->assertSame("Tuerkis", $this->person->getFavoriteColor());
    }

    public function testWholeNameCanBeAsked()
    {
        $this->assertSame("Jonathan Carona", $this->person->getWholeName());
    }

    public function testWholeAddressCanBeAsked()
    {
        $this->assertSame("Boellistrasse 11 " . 5702 . " Niederlenz", $this->person->getWholeAddress());
    }

    public function testBirthdayCanBeAsked()
    {
        $testdate = DateTime::createFromFormat("Y-m-d", "2001-05-19");
        //assertEquals

        $this->assertTrue($testdate == $this->person->getBirthday());
    }

    public function testAgeCanBeAsked()
    {
        $this->assertSame(17, $this->person->getAge());
    }

    public function testTelephoneNumberCanBeAsked()
    {
        $number2 = new Phonenumber('0765163971');
        $this->assertEquals($number2, $this->person->getTelefonnumber());

    }

    public function testAskForNumberCanBeAsked()
    {
        $this->assertTrue(false == $this->person->askforNumber());
    }

}
