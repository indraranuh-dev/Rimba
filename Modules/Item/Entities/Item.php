<?php

namespace Modules\Item\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    /**
     * List of fillable column.
     *
     * @var array $fillable
     */
    protected $fillable = [
        'item_name', 'item_slug_name', 'unit', 'stock', 'unit_price', 'image_path', 'is_draft', 'is_new', 'show_in_catalogue',
    ];

    /**
     * Get only shown item and not draft
     *
     * @return void
     */
    public function getShownItem()
    {
        return static::query()->where('is_draft', 0)
            ->where('show_in_catalogue', 1);
    }

    /**
     * Get only shown item and not draft
     *
     * @return void
     */
    public function getIdAndName()
    {
        return static::query()->select(['id', 'item_name'])->get();
    }
}