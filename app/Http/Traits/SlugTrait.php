<?php

namespace App\Http\Traits;

use Illuminate\Support\Str;

trait SlugTrait
{
    /**
     * GenerateSlug
     * @param mixed $slug
     * @return string
     */
    public function generateSlug($slug): string
    {
        return Str::slug($slug);
    }

    /**
     * CheckSlug
     * @param mixed $slug
     * @param mixed $modelClass
     * @return string
     */
    public function checkSlug(mixed $slug, mixed $modelClass): string
    {
        $slugExists = $modelClass::where('slug', $slug)
            ->exists();
        if ($slugExists) {
            return 'error';
        }
        return true;
    }
}
