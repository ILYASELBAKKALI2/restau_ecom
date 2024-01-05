<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table= 'products';

    protected $fillable = [

        "name","details","image","price","old_price","category_id"
    ];

    protected $primerykey = 'id';

    public function getRouteKeyName()
    {
        return "name";
    }

    public function category()
    {
        return $this->belongsTo(Product::class);
    }

}
