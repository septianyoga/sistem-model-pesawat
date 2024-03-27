<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TRPON extends Model
{
    use HasFactory;
    protected $table = 'trpon';
    protected $fillable = [
        'c_pgm',
        'c_pgm_sub',
        'c_pgm_ver',
        'e_pgm',
        'c_org_core',
        'i_entry',
        'd_entry',
    ];
}
