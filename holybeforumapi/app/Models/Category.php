<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\category
 *
 * @property int $id
 * @property string $category
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|category newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|category newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|category query()
 * @method static \Illuminate\Database\Eloquent\Builder|category whereCategory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|category whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|category whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|category whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class category extends Model
{
    use HasFactory;
}
