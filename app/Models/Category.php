<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $fillable = [
        'title',
        'slug',
        'desc',
        'status',
    ];

    /**
     * @return [type]
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    /**
     * @param mixed $query
     * @param mixed $term
     *
     * @return void
     */
    public function scopeSearch($query, $term): void
    {
        $term = "%$term%";
        $query->where(function ($query) use ($term) {
            $query->where('title', 'like', $term);
            $query->orWhere('desc', 'like', $term);
        });
    }
}
