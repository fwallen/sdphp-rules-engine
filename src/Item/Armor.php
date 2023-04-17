<?php

namespace SDPHP\Rulesengine\Item;

class Armor
{
    public function __construct(protected int $defense, protected string $type)
    {}

    /**
     * @return int
     */
    public function getDefense(): int
    {
        return $this->defense;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }
}