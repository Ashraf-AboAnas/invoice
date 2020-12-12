<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Products;
class sections extends Model
{

    protected $fillable = [
        'section_name',
        'description',
        'Created_by',
    ];


    public function products()
    {
    return $this->hasMany(Products::class);
    }

}
