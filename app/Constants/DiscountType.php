<?php

namespace App\Constants;

class DiscountType
{
    /**
     * All type
     *
     * @var const TYPE
     */
    const TYPE = [
        [
            'name' => 'Persentase',
            'slug_name' => 'persentase',
        ],
        [
            'name' => 'Fix Discount',
            'slug_name' => 'fix-discount',
        ],
    ];

    /**
     * Get all types from the list
     *
     * @return array
     */
    public function getAll(): array
    {
        return SELF::TYPE;
    }
}