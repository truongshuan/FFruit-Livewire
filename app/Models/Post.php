<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;
    use Sluggable;

    protected $table = 'posts';

    protected $fillable = [
        'title',
        'slug',
        'thumbnail',
        'content',
        'topic_id',
    ];

    /**
     * Summary of topic
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function topic()
    {
        return $this->belongsTo(Topic::class, 'topic_id');
    }

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    /**
     * Summary of scopeSearch
     * @param mixed $query
     * @param mixed $term
     * @return void
     */
    public function scopeSearch($query, $term): void
    {
        $term = "%$term%";
        $query->where(function ($query) use ($term) {
            $query->where('title', 'like', $term)
                ->orWhereHas('topic', function ($query) use ($term) {
                    $query->where('title', 'like', $term);
                });
        });
    }
}
