<?php


class Autor
{
    /** @var string  */
    private $name;
    /** @var string  */
    private $vorName;
    /** @var Email  */
    private $email;


    public function __construct(string $name, string $vorName, Email $email = null)
    {
        $this->name = $name;
        $this->vorName = $vorName;
        $this->email = $email;
    }


    public function getName()
    {
        return $this->name;
    }

    public function getVorName()
    {
        return $this->vorName;
    }

    public function getEmail(): Email
    {
        return $this->email;
    }

    public function __toString(): string
    {
        return $this->vorName . ' ' . $this->name;
    }


}