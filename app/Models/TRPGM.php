<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TRPGM extends Model
{
    use HasFactory;
    protected $table = 'trpgm';
    protected $fillable = [
        'c_pgm',
        'n_pgm',
        'i_entry',
        'd_entry',
    ];
}
