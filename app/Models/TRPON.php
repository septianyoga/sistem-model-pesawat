<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TRPON extends Model
{
    use HasFactory;
    protected $table = 'trpon';
    protected $primaryKey =  'id_c_pgm_ver';
    protected $fillable = [
        'c_pgm',
        'c_pgm_sub',
        'e_pgm',
        'c_org_core',
        'i_entry',
        'd_entry',
    ];
}
