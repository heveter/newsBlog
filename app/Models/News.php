<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class News extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $table = 'news';

    public $primaryKey = 'id';

    public $timestamps = true;

    protected $fillable = [
        'title',
        'type',
        'short_description',
        'full_content',
        'date',
        'is_visible',
        'images',
    ];

    protected $guarded = array();

    public function lists()
    {
        return $this->hasMany(Media::class);
    }

    public $casts=[
        'images' => 'array'
    ];
}
