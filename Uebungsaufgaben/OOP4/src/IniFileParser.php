<?php


class IniFileParser
{
    /**
     * @var string
     */
    private $pathToIniFile;

    public function __construct(string $pathToIniFile)
    {
        $this->pathToIniFile = $pathToIniFile;
    }

    public function parse(): array
    {
        return parse_ini_file($this->pathToIniFile, true);
    }

}
