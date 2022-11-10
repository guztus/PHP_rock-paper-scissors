<?php declare(strict_types=1);

class Player
{
    private string $name;
    private ?Element $element = null;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getElement(): Element
    {
        return $this->element;
    }

    public function setElement(Element $chosenElement): void
    {
        $this->element = $chosenElement;
    }
}