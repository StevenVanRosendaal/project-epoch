<?php

return [
    'wood' => [
        'name' => 'Wood',
        'icon' => '🪵',
        'color_scheme' => 'amber',
        'production_config' => 'buildings.sawmill.production.wood',
        'limit_config' => 'buildings.lumber_camp.effect.wood_limit',
    ],
    'stone' => [
        'name' => 'Stone',
        'icon' => '🪨',
        'color_scheme' => 'gray',
        'production_config' => 'buildings.quarry.production.stone',
        'limit_config' => 'buildings.mining_camp.effect.stone_limit',
    ],
    'gold' => [
        'name' => 'Gold',
        'icon' => '🪙',
        'color_scheme' => 'yellow',
        'production_config' => 'buildings.goldmine.production.gold',
        'limit_config' => 'buildings.treasury.effect.gold_limit',
    ],
    'gems' => [
        'name' => 'Gems',
        'icon' => '💎',
        'color_scheme' => 'purple',
        'is_static' => true,
    ],
];
