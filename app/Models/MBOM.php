<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MBOM extends Model
{
    use HasFactory;
    protected $table = 'mboms';
    protected $fillable = [
        'nha',
        'no_item',
        'component',
        'item_description',
        'quantity',
        'drawing',
        'trpgmmodel_id',
    ];

    public function trpgmmodel(): BelongsTo
    {
        return $this->belongsTo(TRPGMMODEL::class);
    }

    public function ebom(): BelongsTo
    {
        return $this->belongsTo(EBOM::class, 'drawing', 'nha');
    }
}
