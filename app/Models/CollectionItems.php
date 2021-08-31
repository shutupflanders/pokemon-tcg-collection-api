<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property integer $id
 * @property integer $card_id
 * @property integer $count
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class CollectionItems extends Model
{
    use HasFactory;

    protected $fillable = [
        'card_id',
        'count'
    ];

    public static function getTableName()
    {
        return with(new static)->getTable();
    }

    /**
     * @return BelongsTo
     */
    public function card(): BelongsTo
    {
        return $this->belongsTo(Cards::class, 'id', 'card_id');
    }
}
