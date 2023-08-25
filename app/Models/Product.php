<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [];


    const VISABLE = 'Visable';
    const HIDDEN = 'Hidden';


    const TRENDING = 'Trending';
    const NONTRENDING = 'Non-Trending';


    const FEARURAD = 'Featured';
    const NONFEARURAD = 'Non-Featured';


    public function Category(): BelongsTo
    {
        return $this->belongsTo(category::class, 'category_id');
    }


    public function ProductImages(): HasMany
    {
        return $this->hasMany(ProductImage::class, 'product_id');
    }

    public function productColors(): HasMany
    {
        return $this->hasMany(ProductColor::class, 'product_id');
    }

    //Status Function 
    public function Status()
    {
        return $this->status == '1' ?  Product::VISABLE  : Product::HIDDEN;
    }

    //Trending Function 
    public function Trending()
    {
        return $this->trending == '1' ?  Product::TRENDING  : Product::NONTRENDING;
    }

    //Featured Function 
    public function Featured()
    {
        return $this->featured == '1' ?  Product::FEARURAD  : Product::NONFEARURAD;
    }


    //Scooping Function
    public function scopeSearch($query, $term)
    {
        $term = "%$term%";
        $query->where(function ($query) use ($term) {
            $query->where('name', 'like', $term)
                ->orwhere('brand', 'like', $term);
        });
    }
}
