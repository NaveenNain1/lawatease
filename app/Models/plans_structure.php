<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class plans_structure extends Model
{
    use HasFactory;
    protected $table="plans_structures";
    protected $fillable=[
'qty',
'plans_particulars_id',
'plans_id',
    ];
}
