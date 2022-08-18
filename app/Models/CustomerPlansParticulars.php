<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerPlansParticulars extends Model
{
    use HasFactory;
    protected $table="customer_plans_particulars";
    protected $fillable=[
'name',
'unit',
'can_avail',
'plans_id',
'customer_plans_id',
'total_service',
'used_service',
'uid',
    ];
}
