<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    /** @use HasFactory<\Database\Factories\CategoryFactory> */
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
     * Get the products associated with the category.
     */
    public function products() : HasMany
    {
        return $this->hasMany(Product::class);
    }
    /**
     * Get the subcategories associated with the category.
     */

    public function subcategories()
    {
        return $this->hasMany(Subcategory::class);
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
