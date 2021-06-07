<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\TopicReaction
 *
 * @property int $id
 * @property string $content
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $user_id
 * @property int $topic_id
 * @method static \Database\Factories\TopicReactionFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|TopicReaction newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TopicReaction newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TopicReaction query()
 * @method static \Illuminate\Database\Eloquent\Builder|TopicReaction whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TopicReaction whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TopicReaction whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TopicReaction whereTopicId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TopicReaction whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TopicReaction whereUserId($value)
 * @mixin \Eloquent
 */
class TopicReaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'content',
    ];
}
