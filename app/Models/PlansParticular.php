<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlansParticular extends Model
{
    use HasFactory;
    protected $table="plans_particulars";
            protected $fillable=[
'name',
'unit',

        ];
}
