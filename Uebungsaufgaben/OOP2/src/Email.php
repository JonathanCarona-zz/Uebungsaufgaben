<?php


class Email
{
    private $email;

    public function __construct($email)
    {
        $this->ensureEmailIsValid($email);
        $this->email = $email;
    }

    public function ensureEmailIsValid($email)
    {
        if ($email != null) {
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $this->email = $email;
            } else {
                throw new Exception($email . ' is not valid');
            }
        }
    }


    public function getEmail(): string
    {
        return $this->email;
    }



    public function __toString(): string
    {
        return $this->email;
    }
}