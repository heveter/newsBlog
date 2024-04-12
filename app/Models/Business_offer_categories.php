<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Business_offer_categories extends Model
{
    use HasFactory;


    protected $table = 'business_offer_categories';

    public $primaryKey = 'id';

    public $timestamps = true;

    protected $fillable = [
        'name',
    ];

    protected $guarded = array();

}
