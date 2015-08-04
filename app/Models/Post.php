<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';

    protected $fillable = [
        'id', 'cat', 'name', 'content', 'release_date', 'is_top', 'img',
        'sort', 'status', 'title', 'keywords', 'description'];
}
