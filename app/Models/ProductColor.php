<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductColor extends Model
{
    use HasFactory;
    protected $table = 'products_colors';
    protected $guarded = [];


    public function color(): BelongsTo
    {
        return $this->belongsTo(color::class, 'color_id');
    }
}
