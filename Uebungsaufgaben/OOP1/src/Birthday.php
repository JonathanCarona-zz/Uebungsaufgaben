<?php


class Birthday
{
    /** @var DateTime  */
    private $birthday;

    public function __construct(DateTime $birthday)
    {
        $this->ensureIsValid($birthday);
        $this->birthday = $birthday;
    }

    public function ensureIsValid($birthday)
    {
        $date = new DateTime("now");
        if ($birthday > $date) {
            throw new Exception("The date is invalid");
        }
    }

    public function __toString(): string
    {
        return $this->birthday;
    }


}