<?php

namespace SDPHP\Rulesengine;

use PhpArch\RulesEngine\Engine;
use SDPHP\Rulesengine\Entity\Character;
use SDPHP\Rulesengine\Item\Armor;
use SDPHP\Rulesengine\Item\Weapon;

class Armourer
{
    protected array $ruleRegistry;

    public function __construct(protected Character $character)
    {
        $this->ruleRegistry = require 'rules_registry.php';
    }

    public function addArmor(Armor $armor)
    {
        $ruleEngine = new Engine($this->ruleRegistry['add-armor']);
        if ($ruleEngine->validateAll($this->character)) {
            $this->character->addArmor($armor);
        }
    }

    public function addWeapon(Weapon $weapon)
    {
        $ruleEngine = new Engine($this->ruleRegistry['add-weapon']);
        $facts = [
            'character' => $this->character,
            'weapon' => $weapon,
            'weaponMap' => $this->ruleRegistry['allowed-character-type']['weapons']
        ];
        if ($ruleEngine->validateAll($facts)) {
            $this->character->addWeapon($weapon);
        }

    }
}