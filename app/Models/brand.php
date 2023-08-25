<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class brand extends Model
{
    use HasFactory;
    protected $table = 'brands';

    const VISABLE = 'Visable';
    const HIDDEN = 'Hidden';

    protected $fillable = [
        'name',
        'slug',
        'category_id',
        'status',
    ];

    public function categories()
    {
        return $this->belongsTo(category::class, 'category_id');
    }

    //Status Function 
    public function Status()
    {

        return $this->status == '1' ?  brand::VISABLE  : brand::HIDDEN;
    }
}
