<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Color extends Model
{
    /** @use HasFactory<\Database\Factories\ColorFactory> */
     use HasFactory;
    protected $fillable = ['name', 'slug'];

    /**
        * Set the name and slug attributes.
     */
    public function setNameAttribute($value)
{
    $this->attributes['name'] = $value;
    $this->attributes['slug'] = Str::slug($value);
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
        return 'slug';
    }


}
