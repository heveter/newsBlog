<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;


    protected $table = 'media';

    public $primaryKey = 'id';

    public $timestamps = true;

    protected $fillable = [
        'title',
        'type',
        'short_description',
        'full_content',
        'date',
        'source',
    ];

    protected $guarded = array();

    public $casts=[
        'source' => 'array'
    ];
}
