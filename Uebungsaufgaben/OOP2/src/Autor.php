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
        //todo: 
        if ($email != null) {
            $this->email = $email;
        } else {
            $this->email = 'No Email';
        }

    }

    public function getName()
    {
        return $this->name;
    }

    public function getVorName()
    {
        return $this->vorName;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function __toString(): string
    {
        return $this->vorName . ' ' . $this->name;
    }


}