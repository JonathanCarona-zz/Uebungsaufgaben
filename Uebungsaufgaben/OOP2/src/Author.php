<?php


class Author
{
    /** @var string  */
    private $lastName;
    /** @var string  */
    private $firstName;
    /** @var Email  */
    private $email;


    public function __construct(string $LastName, string $firstName, Email $email)
    {
        $this->lastName = $LastName;
        $this->firstName = $firstName;
        $this->email = $email;

    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function getEmail(): Email
    {
        return $this->email;
    }

    public function __toString(): string
    {
        return $this->firstName . ' ' . $this->lastName;
    }


}
