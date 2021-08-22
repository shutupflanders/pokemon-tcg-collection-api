<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $set_id
 * @property string $name
 * @property string $series
 * @property integer $total
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class Sets extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'set_id',
        'name',
        'series',
        'total'
    ];
}
