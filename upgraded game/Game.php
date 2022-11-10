<?php declare(strict_types=1);

class Game
{
    private Player $player1;
    private Player $player2;
    private int $player1Score;
    private int $player2Score;


    public function __construct(Player $player1, Player $player2)
    {
        $this->player1 = $player1;
        $this->player2 = $player2;
        $this->player1Score = 0;
        $this->player2Score = 0;
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
                $this->player1Score++;
                return $this->player1;
            }
        }
        $this->player2Score++;
        return $this->player2;
    }

    public function getPlayer1Score(): int
    {
        return $this->player1Score;
    }

    public function getPlayer2Score(): int
    {
        return $this->player2Score;
    }

}