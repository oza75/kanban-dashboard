<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property string             $name;
 * @property Collection<Column> $columns;
 * @property Carbon             $created_at;
 * @property Carbon             $updated_at;
 */
class Board extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function columns(): HasMany
    {
        return $this->hasMany(Column::class);
    }
}
