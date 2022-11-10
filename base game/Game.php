<?php declare(strict_types=1);

class Game
{
    private Player $player1;
    private Player $player2;

    public function __construct(Player $player1, Player $player2)
    {
        $this->player1 = $player1;
        $this->player2 = $player2;
    }

    public function getWinner(): ?Player
    {
        $player2ElementName = $this->player2->getElement()->getName();

        if ($this->player1->getElement()->getName() == $player2ElementName) {
            return null;
        }

        $player1BeatsElements = $this->player1->getElement()->getBeats();
        foreach ($player1BeatsElements as $player1BeatsElement) {
            if ($player1BeatsElement->getName() === $player2ElementName) {
                return $this->player1;
            }
        }
        return $this->player2;
    }
}