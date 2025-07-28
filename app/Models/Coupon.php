<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Coupon extends Model
{
    /** @use HasFactory<\Database\Factories\CouponFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'discount',
        'expires_at',
    ];

    /**
     * Set the name and slug attributes.
     */
    public function setNameAttribute($value) : void
    {
        $this->attributes['name'] = Str::upper($value);
    }

      /**
     * check if the coupon is valid.
     */
    public function checkIfExpired(): string
    {
       if($this->expires_at > date('Y-m-d H:i:s')) {
            return false;
        } else {
            return true;
        }
    }
    /**
     * Get the products associated with the brand.
     */
    public function products() : BelongsToMany
    {
        return $this->belongsToMany(Product::class);
    }
    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName(): string
    {
        return 'name';
    }
}
