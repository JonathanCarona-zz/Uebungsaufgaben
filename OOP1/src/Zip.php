<?php
/**
 * Created by PhpStorm.
 * User: dev
 * Date: 9/5/18
 * Time: 4:24 PM
 */

class Zip
{
    /** @var int */
    private $zip;

    public function __construct(int $zip)
    {
        $this->validateZip($zip);
        $this->zip = $zip;
    }

    private function validateZip(int $zip)
    {
        // Postleitzahl muss eine 4 Stellige nummer sein
        if (($zip <= 999) || ($zip >= 10000)) {
            throw new Exception('The Postcode must be a 4 digit number');
        }
    }

    public function getZip(): int
    {
        return $this->zip;
    }


    public function __toString(): string
    {
        return $this->zip;
    }
}