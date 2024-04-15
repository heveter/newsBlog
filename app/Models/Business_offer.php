<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Business_offer extends Model
{
    use HasFactory;


    protected $table = 'business_offer';

    public $primaryKey = 'id';

    public $timestamps = true;

    public function category()
    {
        return $this->hasOne(Business_offer_categories::class, 'id', 'business_offer_categories_id');
    }

    protected $fillable = [
        'name',
        'short_description',
        'images',
        'business_offer_categories_id'
    ];


    protected $guarded = array();

    public $casts = [
        'images' => 'array'
    ];

}
