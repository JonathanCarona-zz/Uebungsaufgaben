<?php


class Color
{
    /** @var string */
    private $color;

    public function __construct(string $color)
    {
        if (in_array($color, parse_ini_file('configuration.ini', true)['colors'])) {
            $this->color = $color;
        } else {
            throw new Exception('The Color does not exist');
        }

    }

    public function getColor(): string
    {
        return $this->color;
    }



    public function __toString(): string
    {
        return $this->color;
    }

}
