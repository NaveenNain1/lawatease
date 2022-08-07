<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PansFeatures extends Model
{
    use HasFactory;
            protected $table='pans_features';
             protected $fillable=[
'icon',
'name',
'plans_id',

        ];

}
