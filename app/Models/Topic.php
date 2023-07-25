<?php

namespace App\Models;

use App\Http\Livewire\Admin\Posts\Posts;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Topic extends Model
{
    use HasFactory;
    use Sluggable;

    protected $table = 'topics';

    protected $fillable = [
        'title',
        'slug',
        'content',
        'status',
    ];

    public function posts()
    {
        return $this->hasMany(Posts::class);
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
            $query->where('title', 'like', $term);
            $query->orWhere('content', 'like', $term);
        });
    }
}
