<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    const VISABLE = 'Visable';
    const HIDDEN = 'Hidden';

    protected $fillable = [
        'name',
        'slug',
        'description',

        'meta_title',
        'meta_keywoed',
        'meta_description',

        'status',


    ];

    //Relasionship Product Categories
    public function products()
    {
        return $this->hasMany(Product::class, 'category_id');
    }

    public function relatedProducts()
    {
        return $this->hasMany(Product::class, 'category_id')->latest()->take(10);
    }

    public function brands()
    {
        return $this->hasMany(brand::class, 'category_id' , 'id');
    }

    //Status Function 
    public function Status()
    {
        return $this->status == '1' ?  category::VISABLE  : category::HIDDEN;
    }
}
