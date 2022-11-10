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

$elementsForComputer = [
    $rock,
    $paper,
    $scissors,
    $lizard,
    $spock,
];

$rock->setBeats($scissors, $lizard);
$paper->setBeats($rock, $spock);
$scissors->setBeats($paper, $lizard);
$spock->setBeats($rock, $scissors);
$lizard->setBeats($paper, $spock);
$dynamite->setBeats($rock, $paper, $scissors, $lizard, $spock);

$player1Name = (string)readline("Enter your name: ");
$player1 = new Player($player1Name);
$player2 = new Player('Computer');

$firstPlay = true;
while (true) {
    $playAgain = readline("Are you ready to play, {$player1Name} ? (y/n) ");
    if (strtolower($playAgain) !== 'y') {
        exit;
    }

    echo "Available elements:" . PHP_EOL;
    foreach ($elements as $key => $element) {
        echo "[{$key}] {$element->getName()}" . PHP_EOL;
    }

    while (true) {
        $player1ElementById = (int)readline("Choose your element [by number]: ");
        if ($player1ElementById <= count($elements) && $player1ElementById >= 0) {
            break;
        }
    }
    $player1->setElement($elements[$player1ElementById]);

    $player2Element = $elements[array_rand($elementsForComputer)];
    $player2->setElement($player2Element);

    if ($firstPlay) {
        $game = new Game($player1, $player2);
        $firstPlay = false;
    }

    $winner = $game->getWinner();

    echo "= = = = = = = = = = = =" . PHP_EOL;
    if ($winner == null) {
        echo "The game is a tie!" . PHP_EOL;
        echo "= = = = = = = = = = = =" . PHP_EOL . PHP_EOL;
        echo "Score - {$player1->getName()}: {$game->getPlayer1Score()} | {$player2->getName()}: {$game->getPlayer2Score()}" . PHP_EOL . PHP_EOL;
        continue;
    }
    echo "{$winner->getName()} wins with {$winner->getElement()->getName()}" . PHP_EOL;
    echo "= = = = = = = = = = = =" . PHP_EOL;
    echo "Score - {$player1->getName()}: {$game->getPlayer1Score()} | {$player2->getName()}: {$game->getPlayer2Score()}" . PHP_EOL . PHP_EOL;
}