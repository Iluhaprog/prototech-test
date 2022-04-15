<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    use HasFactory;
    
    public $timestamps = false;

    public $fillable = [
        'valute_id',
        'num_code',
        'char_code',
        'name',
        'value',
        'date',
    ];

    public function getDateFormat()
    {
        return 'c';
    }
}
