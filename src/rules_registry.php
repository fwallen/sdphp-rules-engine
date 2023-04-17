<?php

use SDPHP\Rulesengine\Entity\Character;

return [
    'add-armor'              => [
        function (Character $character) {
            return in_array(strtolower($character->getType()), [
                'warrior', 'thief',
            ]);
        },
        function (Character $character) {
            $expression = new Symfony\Component\ExpressionLanguage\ExpressionLanguage();
            $rule = 'character.getType() == "Warrior" || character.getType() == "Thief"';
            return $expression->evaluate($rule, ['character' => $character]);
        }
    ],
    'add-weapon'             => [
        function (array $facts) {
            $character = $facts['character'];
            $weapon    = $facts['weapon'];
            $weaponMap = $facts['weaponMap'];
            $weaponType = strtolower($weapon->getType());
            $characterType = strtolower($character->getType());
            return in_array($characterType, $weaponMap[$weaponType]);
        },
    ],
    'allowed-character-type' => [
        'weapons' => [
            'sword' => ['warrior', 'thief'],
            'staff' => ['warrior', 'thief', 'wizard'],
            'wand'  => ['wizard'],
        ]
    ],
];