<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property integer $id
 * @property integer $set_id
 * @property string $card_id
 * @property string $name
 * @property string $number
 * @property string $rarity
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property Sets $set
 * @property CollectionItems[] $collectionReference
 */
class Cards extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'set_id',
        'card_id',
        'name',
        'number',
        'rarity'
    ];

    /**
     * @return BelongsTo
     */
    public function set(): BelongsTo
    {
        return $this->belongsTo(Sets::class, 'set_id', 'id');
    }

    /**
     * @return HasMany
     */
    public function collectionReference(): HasMany
    {
        return $this->hasMany(CollectionItems::class, 'card_id', 'id');
    }
}
