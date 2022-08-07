<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class addresses extends Model
{
    use HasFactory;
      protected $table="addresses";

    protected $fillable = [
'house_no',
'street',
'district',
'state',
'country',
'pincode',
'uid',
    ];
}
