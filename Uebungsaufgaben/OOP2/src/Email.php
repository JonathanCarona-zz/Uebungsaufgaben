<?php


class Email
{
    /** @var string */
    private $email;


    public function __construct(string $email)
    {
        $this->ensureEmailIsValid($email);
        $this->email = $email;
    }

    private function ensureEmailIsValid($email)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->email = $email;
        } else {
            throw new Exception($email . ' is not valid');
        }
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function __toString(): string
    {
        return $this->email;
    }
}
