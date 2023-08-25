<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;
    protected $guarded = [];
    //Status Function 
    public function Status()
    {
        return $this->status == '1' ?  Product::VISABLE  : Product::HIDDEN;
    }
}
