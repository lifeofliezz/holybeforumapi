<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Topic
 *
 * @property int $id
 * @property string $title
 * @property string $content
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $user_id
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\TopicReaction[] $topicreactions
 * @property-read int|null $topicreactions_count
 * @property-read \App\Models\User|null $users
 * @method static \Database\Factories\TopicFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Topic newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Topic newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Topic query()
 * @method static \Illuminate\Database\Eloquent\Builder|Topic whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Topic whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Topic whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Topic whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Topic whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Topic whereUserId($value)
 * @mixin \Eloquent
 */
class Topic extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'content'
    ];

    public function users()
    {
        return $this->hasOne(User::class);
    }

//    public function topicCategories(){
//        return $this->hasMany(topicCategory::class);
//    }

    public function topic_reactions()
    {
        return $this->hasMany(TopicReaction::class);
    }

    public function scopeSearch($query, $term)
    {
        return $query->where('title', 'like', "%{$term}%")
            ->orWhere('content', 'like', "%{$term}%");
    }

}
