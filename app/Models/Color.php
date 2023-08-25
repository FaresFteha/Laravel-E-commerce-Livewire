<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Color extends Model
{
    use HasFactory;
    const VISABLE = 'Visable';
    const HIDDEN = 'Hidden';

    protected $fillable = [
        'name',
        'code',
        'status',
    ];


    

    //Status Function 
    public function Status()
    {
        return $this->status == '1' ?  category::VISABLE  : category::HIDDEN;
    }
}
