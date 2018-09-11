<?php


class Buch
{
    /** @var string  */
    private $titel;
    /** @var Autor  */
    private $autor;
    /** @var int  */
    private $erscheinungsjahr;
    /** @var int  */
    private $anzahlSeiten;
    /** @var string  */
    private $genre;


    public function __construct(string $titel, Autor $autor, int $erscheinungsjahr, int $anzahlSeiten, string $genre)
    {
        $this->titel = $titel;
        $this->autor = $autor;
        $this->ensureReleaseYearIsValid($erscheinungsjahr);
        $this->erscheinungsjahr = $erscheinungsjahr;
        if ($anzahlSeiten < 0) {
            throw new Exception('There is no book with less than 0 Pages');
        }
        $this->anzahlSeiten = $anzahlSeiten;
        $this->genre = $genre;
    }

    public function ensureReleaseYearIsValid($erscheinungsjahr)
    {
        $date = new DateTime('now'); //Create a date which the time is now
        $datestring = date_format($date, 'Y-m-d'); // Convert date to string
        $year = explode('-', $datestring); // Explode to get the year
        if ($erscheinungsjahr > $year[0]) {
            throw new Exception('The release year cannot be in the future');
        }
    }


    public function getTitel(): string
    {
        return $this->titel;
    }


    public function getAutor(): Autor
    {
        return $this->autor;
    }


    public function getErscheinungsjahr(): int
    {
        return $this->erscheinungsjahr;
    }


    public function getAnzahlSeiten(): int
    {
        return $this->anzahlSeiten;
    }


    public function getGenre(): string
    {
        return $this->genre;
    }


}