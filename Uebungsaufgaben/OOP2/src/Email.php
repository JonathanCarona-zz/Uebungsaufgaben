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

    private function ensureEmailIsValid($email): void
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new Exception($email . ' is not valid');
        }
    }

    public function __toString(): string
    {
        return $this->email;
    }
}
