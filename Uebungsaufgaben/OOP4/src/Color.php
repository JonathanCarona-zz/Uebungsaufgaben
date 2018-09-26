<?php


class Color
{
    /** @var string */
    private $color;

    public function __construct(string $color)
    {
        $this->color = $color;
    }

    public function __toString(): string
    {
        return $this->color;
    }


}
