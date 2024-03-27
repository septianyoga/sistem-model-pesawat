<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TRPGMMODEL extends Model
{
    use HasFactory;
    protected $table = 'trpgmmodel';
    protected $primaryKey =  'id_c_pgm_pon';
    protected $fillable = [
        'id_c_pgm',
        'id_c_pgm_sub',
        'id_c_pgm_ver',
        'c_pgm_model',
        'i_part_nha',
        'n_pgm_model',
        'i_entry',
        'd_entry',
    ];

    public function trpgm(): BelongsTo
    {
        return $this->belongsTo(TRPGM::class, 'id_c_pgm');
    }

    public function trpgmsub(): BelongsTo
    {
        return $this->belongsTo(TRPGMSUB::class, 'id_c_pgm_sub');
    }

    public function trpon(): BelongsTo
    {
        return $this->belongsTo(TRPON::class, 'id_c_pgm_ver');
    }
}
