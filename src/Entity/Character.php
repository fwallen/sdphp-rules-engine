<?php

namespace SDPHP\Rulesengine\Entity;

use SDPHP\Rulesengine\Item\Armor;
use SDPHP\Rulesengine\Item\Weapon;

class Character
{
    public function __construct(
        protected string $name,
        protected string $type,
        protected int    $level,
        protected int    $maxHitPoints,
        protected int    $hitPoints,
        protected array  $inventory = [
            'armor' => [],
            'weapons' => [],
        ]
    )
    {
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @return int
     */
    public function getLevel(): int
    {
        return $this->level;
    }

    /**
     * @return int
     */
    public function getMaxHitPoints(): int
    {
        return $this->maxHitPoints;
    }

    /**
     * @return int
     */
    public function getHitPoints(): int
    {
        return $this->hitPoints;
    }

    /**
     * @return array
     */
    public function getInventory(): array
    {
        return $this->inventory;
    }

    public function addArmor(Armor $armor)
    {
        $this->inventory['armor'][] = $armor;
    }

    public function addWeapon(Weapon $weapon)
    {
        $this->inventory['weapons'][] = $weapon;
    }

    public function getArmor(): array
    {
        return $this->inventory['armor'];
    }

    public function getWeapons(): array
    {
        return $this->inventory['weapons'];
    }
}