<?php

namespace Modules\Customer\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
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
        'id', 'name', 'contact', 'email', 'address', 'discount', 'discount_type', 'ktp', 'image_path',
    ];

    public function getOnlyIdAndName()
    {
        return static::query()->select(['id', 'name'])->get();
    }
}