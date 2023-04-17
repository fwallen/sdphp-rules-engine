<?php

namespace SDPHP\Rulesengine\Item;

class Weapon
{
    public function __construct(protected int $damage, protected string $type)
    {}

    /**
     * @return int
     */
    public function getDamage(): int
    {
        return $this->damage;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }
}