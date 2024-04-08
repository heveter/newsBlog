<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class News extends Model
{
    use HasFactory;

    protected $table = 'news';

    public $primaryKey = 'id';

    public $timestamps = true;

    protected $fillable = [
        'title',
        'content',
        'post_type',
        'category_id',
        'author_id',
    ];

    protected $guarded = array();
}
