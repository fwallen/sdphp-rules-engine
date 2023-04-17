<?php

use SDPHP\Rulesengine\Entity\Character;

class CharacterTest extends \PHPUnit\Framework\TestCase
{
    public function it_can_instantiate_a_character()
    {
        $character = $this->getCharacter();
        $this->assertInstanceOf(Character::class, $character);
    }

    /**
     * @test
     */
    public function it_can_add_armor_to_character()
    {
        $character = $this->getCharacter();
        $armourer = new \SDPHP\Rulesengine\Armourer($character);
        $armor = new \SDPHP\Rulesengine\Item\Armor(1, 'shield');
        $armourer->addArmor($armor);
        $this->assertTrue(in_array($armor, $character->getArmor()));
    }

    /**
     * @test
     */
    public function it_can_add_weapons_to_character()
    {
        $character = $this->getCharacter();
        $armourer = new \SDPHP\Rulesengine\Armourer($character);
        $weapon = new \SDPHP\Rulesengine\Item\Weapon(1, 'sword');
        $weapon2 = new \SDPHP\Rulesengine\Item\Weapon(1, 'staff');
        $armourer->addWeapon($weapon);
        $armourer->addWeapon($weapon2);
        $this->assertTrue(in_array($weapon, $character->getWeapons()));
        $this->assertTrue(in_array($weapon2, $character->getWeapons()));

        $wizard = $this->getCharacter('Wizard');
        $armourer = new \SDPHP\Rulesengine\Armourer($wizard);
        $weapon = new \SDPHP\Rulesengine\Item\Weapon(1, 'wand');
        $armourer->addWeapon($weapon);
        $this->assertTrue(in_array($weapon, $wizard->getWeapons()));
    }

    /**
     * @test
     */
    public function it_cannot_add_weapons_to_character()
    {
        $wizard = $this->getCharacter('Wizard');
        $armourer = new \SDPHP\Rulesengine\Armourer($wizard);
        $weapon = new \SDPHP\Rulesengine\Item\Weapon(1, 'sword');
        $armourer->addWeapon($weapon);
        $this->assertFalse(in_array($weapon, $wizard->getWeapons()));

        $warrior = $this->getCharacter();
        $armourer = new \SDPHP\Rulesengine\Armourer($warrior);
        $weapon = new \SDPHP\Rulesengine\Item\Weapon(1, 'wand');
        $armourer->addWeapon($weapon);
        $this->assertFalse(in_array($weapon, $warrior->getWeapons()));
    }

    /**
     * @return Character
     */
    protected function getCharacter(string $type = 'Warrior'): Character
    {
        return new Character('Joe Character', $type, 1, 10, 10);
    }
}