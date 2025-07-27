<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Childcategory extends Model
{
    /** @use HasFactory<\Database\Factories\ChildcategoryFactory> */
  use HasFactory;
    protected $fillable = ['name', 'slug', 'subcategory_id'];
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
    public function subcategory() : BelongsTo
    {
        return $this->belongsTo(Subcategory::class);
    }

    public function products() : HasMany
    {
        return $this->hasMany(Product::class);
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
