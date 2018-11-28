<?php


class Color
{
    /** @var string */
    private $color;

    public function __construct(string $color, Configuration $configuration)
    {
        $iniSettings = $configuration->getColors();
        if (!in_array($color, $iniSettings, true)) {
            throw new Exception('The color is not valid');
        }
        $this->color = $color;
    }

    public function __toString(): string
    {
        return $this->color;
    }

    public function getColor(): string
    {
        return $this->color;
    }
}
