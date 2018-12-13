<?php


class Record
{
    /** @var string */
    private $author;
    /** @var string */
    private $title;
    /** @var string */
    private $genre;
    /** @var double */
    private $price;
    /** @var string */
    private $publish_date;
    /** @var string */
    private $description;


    public function __construct(string $author, string $title, string $genre, float $price, string $publish_date, string $description)
    {
        $this->author = $author;
        $this->title = $title;
        $this->genre = $genre;
        $this->price = $price;
        $this->publish_date = $publish_date;
        $this->description = $description;
    }
}
