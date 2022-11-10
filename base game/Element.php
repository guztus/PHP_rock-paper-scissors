<?php declare(strict_types=1);

class Element
{
    private string $name;
    private array $beats;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setBeats(Element ...$elements): void
    {
        foreach ($elements as $element) {
            $this->beats [] = $element;
        }
    }

    public function getBeats(): array
    {
        return $this->beats;
    }
}