<?php

namespace App\Models;

class Country extends Model
{
    /**
     * Get all news types for the country
     */
    public function news()
    {
        return $this->hasMany(News::class);
    }
}
