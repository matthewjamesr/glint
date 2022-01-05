<?php

namespace App\Models;

class News extends Model
{
    /**
     * Get the country that owns the news content
     */
    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}
