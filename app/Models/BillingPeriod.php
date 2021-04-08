<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Yadakhov\InsertOnDuplicateKey;

class BillingPeriod extends Model
{
    use HasFactory;
    use InsertOnDuplicateKey;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'period',
        'months',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'period' => 'string',
        'months' => 'integer',
    ];

    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
        'period' => null,
        'months' => 1,
    ];
}
