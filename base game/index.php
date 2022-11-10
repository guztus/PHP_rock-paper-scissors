<?php declare(strict_types=1);

require_once "Element.php";
require_once "Game.php";
require_once "Player.php";

$rock = new Element('Rock');
$paper = new Element('Paper');
$scissors = new Element('Scissors');
$lizard = new Element('Lizard');
$spock = new Element('Spock');
$dynamite = new Element('Dynamite');

$elements = [
    $rock,
    $paper,
    $scissors,
    $lizard,
    $spock,
    $dynamite
];

$rock->setBeats($scissors, $lizard);
$paper->setBeats($rock, $spock);
$scissors->setBeats($paper, $lizard);
$spock->setBeats($rock, $scissors);
$lizard->setBeats($paper, $spock);
$dynamite->setBeats($rock, $paper, $scissors, $lizard, $spock);

$player1Name = (string)readline("Enter your name: ");
while (true) {
    $playAgain = readline("Ready to play? (y/n) ");
    if (strtolower($playAgain) !== 'y') {
        exit;
    }

    echo "Available elements:" . PHP_EOL;
    foreach ($elements as $key => $element) {
        echo "[{$key}] {$element->getName()}" . PHP_EOL;
    }


    $player1Element = (int)readline("Choose your element [by number]: ");
    $player1 = new Player($player1Name);
    $player1->setElement($elements[$player1Element]);

    $player2Element = $elements[array_rand($elements)];
    $player2 = new Player('Computer');
    $player2->setElement($player2Element);


    $game = new Game($player1, $player2);

    $winner = $game->getWinner();
    if ($winner == null) {
        echo "The game is a tie!" . PHP_EOL . PHP_EOL;
        continue;
    }
    echo "{$winner->getName()} wins with {$winner->getElement()->getName()}" . PHP_EOL . PHP_EOL;
}