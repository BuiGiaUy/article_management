<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    public function seo()
    {
        return $this->hasOne(Seo::class, 'post_id', 'id');
    }
}
