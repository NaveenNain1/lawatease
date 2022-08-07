<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class plans extends Model
{
    use HasFactory;
        protected $table="plans";

    protected $fillable = [
'name',
'discounted_price',
'period',
'period_type',
'discount',
'description',
    ];
}
