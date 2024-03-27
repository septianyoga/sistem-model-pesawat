<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TRPGMMODEL extends Model
{
    use HasFactory;
    protected $table = 'trpgmmodel';
    protected $fillable = [
        'trpgm_id',
        'trpgmsub_id',
        'trpon_id',
        'c_pgm_model',
        'i_part_nha',
        'n_pgm_model',
        'user_id',
        'd_entry',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function trpgm(): BelongsTo
    {
        return $this->belongsTo(TRPGM::class);
    }

    public function trpgmsub(): BelongsTo
    {
        return $this->belongsTo(TRPGMSUB::class);
    }

    public function trpon(): BelongsTo
    {
        return $this->belongsTo(TRPON::class);
    }
}
