<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TRPGMSUB extends Model
{
    use HasFactory;
    protected $table = 'trpgmsub';
    protected $primaryKey =  'id_c_pgm_sub';
    protected $fillable = [
        'n_pgm_sub',
        'i_entry',
        'd_entry',
    ];
}
