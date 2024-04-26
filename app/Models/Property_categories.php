<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property_categories extends Model
{
    use HasFactory;


    protected $table = 'property_categories';

    public $primaryKey = 'id';

    public $timestamps = true;

    protected $fillable = [
        'name',
    ];

    protected $guarded = array();

}
