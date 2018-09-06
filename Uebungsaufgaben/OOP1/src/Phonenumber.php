<?php

class Phonenumber
{
    /** @var string */
    private $phonenumber;

    public function __construct(string $phonenumber)
    {
        $this->ensureIsValid($phonenumber);

        $this->phonenumber = $phonenumber;
    }

    private function ensureIsValid(string $phonenumber)
    {
        if ((!ctype_digit($phonenumber) || (strlen($phonenumber) != 10))) {
            throw new Exception("The number is invalid.");
        }
    }



    public function __toString(): string
    {
        return $this->phonenumber;
    }
}