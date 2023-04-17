<?php

use PHPUnit\Framework\TestCase;
use SDPHP\Rulesengine\Armourer;
use SDPHP\Rulesengine\Entity\Character;
use SDPHP\Rulesengine\Item\Armor;
use SDPHP\Rulesengine\Item\Weapon;

class CharacterTest extends TestCase
{
    /**
     * @test
     */
    public function it_can_instantiate_a_character()
    {
        $character = $this->getCharacter();
        $this->assertInstanceOf(Character::class, $character);
    }

    /**
     * @return Character
     */
    protected function getCharacter(string $type = 'Warrior'): Character
    {
        return new Character('Joe Character', $type, 1, 10, 10);
    }

    /**
     * @test
     */
    public function it_can_add_armor_to_character()
    {
        $character = $this->getCharacter();
        $armourer  = new Armourer($character);
        $armor     = new Armor(1, 'shield');
        $armourer->addArmor($armor);
        $this->assertTrue(in_array($armor, $character->getArmor()));
    }

    /**
     * @test
     */
    public function it_can_add_weapons_to_character()
    {
        $character = $this->getCharacter();
        $armourer  = new Armourer($character);
        $weapon    = new Weapon(1, 'sword');
        $weapon2   = new Weapon(1, 'staff');
        $armourer->addWeapon($weapon);
        $armourer->addWeapon($weapon2);
        $this->assertTrue(in_array($weapon, $character->getWeapons()));
        $this->assertTrue(in_array($weapon2, $character->getWeapons()));
        $wizard   = $this->getCharacter('Wizard');
        $armourer = new Armourer($wizard);
        $weapon   = new Weapon(1, 'wand');
        $armourer->addWeapon($weapon);
        $this->assertTrue(in_array($weapon, $wizard->getWeapons()));
    }

    /**
     * @test
     */
    public function it_cannot_add_weapons_to_character()
    {
        $wizard   = $this->getCharacter('Wizard');
        $armourer = new Armourer($wizard);
        $sword    = new Weapon(1, 'sword');
        $armourer->addWeapon($sword);
        $this->assertFalse(in_array($sword, $wizard->getWeapons()));
        $warrior  = $this->getCharacter();
        $armourer = new Armourer($warrior);
        $wand     = new Weapon(1, 'wand');
        $armourer->addWeapon($wand);
        $this->assertFalse(in_array($sword, $warrior->getWeapons()));
        $shopKeeper = $this->getCharacter('Shop Keeper');
        $armourer   = new Armourer($shopKeeper);
        $armourer->addWeapon($sword);
        $armourer->addWeapon($wand);
        $weapons = $shopKeeper->getWeapons();
        $this->assertFalse(in_array($sword, $weapons));
        $this->assertFalse(in_array($wand, $weapons));
    }
}