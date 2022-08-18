<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmpanellmentEducationalData extends Model
{
    use HasFactory;
      protected $table="empanellment_educational_data";

    protected $fillable = [
'name',
'board',
'passing_date',
'percentage',
'achievement',
'advocate_empanellments_id',
'uid'
    ];
}
