<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table="orders";

    protected $fillable = [
        "user_id","product_name","address","total","qty","city","telephone","country",
        "delivery_date","paid","delivered","livreur"
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
