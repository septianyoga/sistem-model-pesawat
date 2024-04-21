<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EBOM extends Model
{
    use HasFactory;
    protected $table = 'eboms';
    protected $fillable = [
        'nha',
        'no_item',
        'component',
        'item_description',
        'quantity',
        'trpgmmodel_id',
    ];

    public function trpgmmodel(): BelongsTo
    {
        return $this->belongsTo(TRPGMMODEL::class);
    }
}
