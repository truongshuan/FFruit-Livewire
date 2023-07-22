<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    use Sluggable;

    protected $table = 'products';

    protected $fillable = [
        'name',
        'slug',
        'path_image',
        'price',
        'sale_price',
        'description',
        'category_id',
    ];

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function scopeSearch($query, $term): void
    {
        $term = "%$term%";
        $query->where(function ($query) use ($term) {
            $query->where('name', 'like', $term)
                ->orWhereHas('category', function ($query) use ($term) {
                    $query->where('title', 'like', $term);
                });
        });
    }

    public function getImageUrl()
    {
        if ($this->path_image) {
            return Storage::disk('products')->url($this->path_image);
        } else {
            return null;
        }
    }
}
