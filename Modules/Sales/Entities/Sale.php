<?php

namespace Modules\Sales\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    /**
     * Disable auto increment
     *
     * @var boolean
     */
    public $incrementing = false;

    /**
     * List of fillable column
     *
     * @var array $fillable
     */
    protected $fillable = [
        'id', 'transaction_code', 'transaction_date', 'customers_id',
    ];
}