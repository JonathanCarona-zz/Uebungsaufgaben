<?php


class Color
{
    /** @var string */
    private $color;
    /** @var Configuration */
    private $configuration;
    /** @var array */
    private $iniSettings;

    public function __construct(string $color, Configuration $configuration)
    {
        $this->configuration = $configuration;
        $this->iniSettings = $this->configuration->getIniFileSettings()['colors'];
        if (in_array($color, $this->iniSettings)) {
            $this->color = $color;
        } else {
            throw new Exception('The color is not valid');
        }
    }

    public function __toString(): string
    {
        return $this->color;
    }

}
