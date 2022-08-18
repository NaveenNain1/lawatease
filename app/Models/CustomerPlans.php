<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerPlans extends Model
{
    use HasFactory;
        protected $table="customer_plans";
        protected $fillable=[
        	'purchase_date',
'name',
'purchase_price',
'period',
'period_type',
'plans_id',
'uid'
        ];
}
