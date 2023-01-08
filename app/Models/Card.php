<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property string  $title;
 * @property string  $description;
 * @property int     $position;
 * @property Column  $column;
 * @property int     $column_id;
 * @property Carbon  $created_at;
 * @property Carbon  $updated_at;
 * @property ?Carbon $deleted_at;
 */
class Card extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function column(): BelongsTo
    {
        return $this->belongsTo(Column::class);
    }
}
