<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Link
 * @package App\Models
 */
class Link extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected array $fillable = [
        'url',
        'type',
        'customer_id',
    ];

    /**
     * @var array
     */
    public static array $types = [
        'product',
        'category',
        'static-page',
        'checkout',
        'homepage',
    ];

    public static array $rules = [
        'url' => ['required', 'url'],
        'type' => [
            'required',
            'in:product,category,static-page,checkout,homepage'
        ],
    ];

    /**
     * @var array|string[]
     */
    protected array $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
    ];
}
