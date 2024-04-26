<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;


    protected $table = 'property';

    public $primaryKey = 'id';

    public $timestamps = true;

    public function category()
    {
        return $this->hasOne(Property_categories::class, 'id', 'property_categories_id');
    }

    protected $fillable = [
        'name',
        'short_description',
        'type',
        'images',
        'property_categories_id'
    ];


    protected $guarded = array();

    public $casts = [
        'images' => 'array'
    ];

}
