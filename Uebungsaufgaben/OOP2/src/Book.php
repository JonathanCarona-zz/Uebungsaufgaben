<?php


class Book
{
    /** @var string  */
    private $title;
    /** @var Author  */
    private $author;
    /** @var int  */
    private $releaseYear;
    /** @var int  */
    private $anzahlSeiten;
    /** @var string  */
    private $genre;


    public function __construct(string $title, Author $author, int $releaseYear, int $amountOfPages, string $genre)
    {
        $this->title = $title;
        $this->author = $author;
        $this->ensureReleaseYearIsValid($releaseYear);
        $this->releaseYear = $releaseYear;
        if ($amountOfPages <= 0) {
            throw new Exception('There is no book with or less than 0 Pages');
        }
        $this->anzahlSeiten = $amountOfPages;
        $this->genre = $genre;
    }

    private function ensureReleaseYearIsValid($releaseYear): void
    {
        $date = new DateTime('now'); //Create a date which the time is now
        $year = date_format($date, 'Y'); // Convert date to string
        if ($releaseYear > $year) {
            throw new Exception('The release year cannot be in the future');
        }
    }


    public function getTitle(): string
    {
        return $this->title;
    }


    public function getAuthor(): Author
    {
        return $this->author;
    }


    public function getReleaseYear(): int
    {
        return $this->releaseYear;
    }


    public function getAmountOfPages(): int
    {
        return $this->anzahlSeiten;
    }


    public function getGenre(): string
    {
        return $this->genre;
    }

    public function getEmailAddressOfTheAuthor(): Email
    {
        return $this->author->getEmail();
    }



}
