<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $primerykey = 'id';

    protected $fillable = ['title','image'];

    public function getRouteKeyName()
    {
        return "title";   
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

}

