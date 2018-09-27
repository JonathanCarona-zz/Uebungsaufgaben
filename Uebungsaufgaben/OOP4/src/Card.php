<?php


class Card
{
    /** @var Color */
    private $color;
    /** @var bool */
    private $isCovered = false;

    public function __construct(Color $color)
    {
        $this->color = $color;

    }

    public function flipEqualColorCard(Card $card, Color $color): void
    {
        if ($this->compareCard($color, $card)) {
            $card->setIsCovered(true);
        }
    }

    private function compareCard(Color $color, Card $card): bool
    {
        $cardIsEqual = false;
        /** @var Card $card */
        if ($card->getColor() === $color) {
            $cardIsEqual = true;
        }
        return $cardIsEqual;
    }


    public function setIsCovered(bool $isCovered): void
    {
        $this->isCovered = $isCovered;
    }



    public function getColor(): Color
    {
        return $this->color;
    }


    public function getIsCovered(): bool
    {
        return $this->isCovered;
    }

    public function __toString(): string
    {
        return $this->color . ' Card';
    }

}
