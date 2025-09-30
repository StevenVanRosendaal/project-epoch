<?php

return [
    'sawmill' => [
        'name' => 'Sawmill',
        'base_cost' => ['wood' => 50, 'stone' => 20],
        'cost_multiplier' => 1.5,
        'production' => [
            'wood' => 10, // per hour at level 1
        ],
    ],
    'quarry' => [
        'name' => 'Quarry',
        'base_cost' => ['wood' => 30, 'stone' => 40],
        'cost_multiplier' => 1.6,
        'production' => [
            'stone' => 8,
        ],
    ],
    'goldmine' => [
        'name' => 'Goldmine',
        'base_cost' => ['wood' => 70, 'stone' => 50],
        'cost_multiplier' => 1.9,
        'production' => [
            'gold' => 5,
        ],
    ],
    'lumber_camp' => [
        'name' => 'Lumber Camp',
        'base_cost' => ['wood' => 50, 'stone' => 10],
        'cost_multiplier' => 1.5,
        'effect' => [
            'wood_limit' => 5000, // extra storage capacity
        ],
    ],
    'mining_camp' => [
        'name' => 'Mining Camp',
        'base_cost' => ['wood' => 50, 'stone' => 50],
        'cost_multiplier' => 1.5,
        'effect' => [
            'stone_limit' => 500, // extra storage capacity
        ],
    ],
    'treasury' => [
        'name' => 'Treasury',
        'base_cost' => ['wood' => 100, 'stone' => 100],
        'cost_multiplier' => 2,
        'effect' => [
            'gold_limit' => 500, // extra storage capacity
        ],
    ],
];
