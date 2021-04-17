<?php

namespace App\Constants;

class Unit
{
    /**
     * All unit
     *
     * @var const UNIT
     */
    const UNIT = [
        [
            'name' => 'Kilogram',
            'slug_name' => 'kg',
        ],
        [
            'name' => 'Gram',
            'slug_name' => 'gr',
        ],
        [
            'name' => 'Pcs',
            'slug_name' => 'pcs',
        ],
    ];

    /**
     * Get all units from the list
     *
     * @return array
     */
    public function getAll(): array
    {
        return SELF::UNIT;
    }
}