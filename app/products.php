<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Sections;
class products extends Model
{

    protected $fillable = [
        'Product_name',
        'description',
        'section_id',
    ];

    public function section()
    {
    return $this->belongsTo(Sections::class);
    }
}
