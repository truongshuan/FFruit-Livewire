<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    use HasFactory;
    // use Sluggable;

    /**
     * Summary of table
     * @var string
     */
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

    /**
     * Relationship many-to-one with categories table
     * @return BelongsTo
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    /**
     * Relationship one-to-many with order detail table
     * @return HasMany
     */
    public function orderDetails(): HasMany
    {
        return $this->hasMany(OrderDetail::class);
    }

    /**
     * Research by name
     * @param mixed $query
     * @param mixed $term
     *
     * @return void
     */
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

    /**
     * Get thumbnail url
     * @return string|null
     */
    public function getImageUrl(): ?string
    {
        if ($this->path_image) {
            return Storage::disk('products')->url($this->path_image);
        } else {
            return null;
        }
    }
}
