<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TRPGM extends Model
{
    use HasFactory;
    protected $table = 'trpgm';
    protected $primaryKey =  'id_c_pgm';
    protected $fillable = [
        'n_pgm',
        'i_entry',
        'd_entry',
    ];
}
