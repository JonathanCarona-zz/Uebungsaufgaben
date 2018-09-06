<?php

class Person
{
    /** @var string */
    private $name;
    /** @var string */
    private $surname;
    /** @var string */
    private $address;
    /** @var Zip  */
    private $postleitzahl;
    /** @var string */
    private $placeOfResidence;
    /** @var DateTime  */
    private $birthday;
    /** @var Phonenumber */
    private $telephonenumber;
    /** @var string */
    private $favouriteColor;
    /** @var bool */
    private $wasAskedforNumber = false;
    public function __construct(string $name,
                                string $surname,
                                string $address,
                                Zip $postleitzahl,
                                string $placeOfResidence,
                                DateTime $birthday,
                                Phonenumber $telephonenumber,
                                string $favouriteColor)
    {
        $this->name = $name;
        $this->surname = $surname;
        $this->address = $address;
        $this->postleitzahl = $postleitzahl;
        $this->placeOfResidence = $placeOfResidence;
        $this->birthday = $birthday;
        $this->telephonenumber = $telephonenumber;
        $this->favouriteColor = $favouriteColor;
    }
    public function getFavoriteColor(): string
    {
        return $this->favouriteColor;
    }
    // Fragt den Benutzer ob die die getTelephonenumber() Methode schon ausgeführt worden ist.
    public function askforNumber(): bool
    {
        return $this->wasAskedforNumber;
    }
    public function getTelefonnumber(): Phonenumber
    {
        $this->wasAskedforNumber = true;
        return $this->telephonenumber;
    }
    // Gibt das Alter zurück.
    public function getAge(): int
    {
        $timezone = new DateTimeZone("Europe/Zurich");
        return $this->birthday->diff(new DateTime("now", $timezone))->y;
    }
    // Gibt das geburtsdatum zurück
    public function getBirthday(): DateTime
    {
        return $this->birthday;
    }
    // Gibt den ganzen Name zurück.
    public function getWholeName(): string
    {
        return $this->surname . ' ' . $this->name;
    }
    // Gibt den wohnort zurück.
    public function getWholeAddress(): string
    {
        return $this->address . ' ' . $this->postleitzahl . ' ' . $this->placeOfResidence;
    }
}