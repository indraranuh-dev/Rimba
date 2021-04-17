<?php

namespace Modules\Sales\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesDetail extends Model
{
    use HasFactory;

    /**
     * List of fillable column
     *
     * @var array $fillable
     */
    protected $fillable = [
        'sales_id', 'items_id', 'quantity',
    ];
}