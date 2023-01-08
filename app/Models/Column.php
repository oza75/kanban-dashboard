<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property string           $name;
 * @property int              $position;
 * @property int              $board_id;
 * @property Collection<Card> $cards;
 * @property Carbon           $created_at;
 * @property Carbon           $updated_at;
 */
class Column extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function cards(): HasMany
    {
        return $this->hasMany(Card::class);
    }
}
