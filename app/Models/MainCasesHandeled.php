<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MainCasesHandeled extends Model
{
         use HasFactory;
            protected $table='main_cases_handeleds';
             protected $fillable=[
'CourtName',
'CaseName',
'LawConcernedArea',
'LastOrderDate',
'Role',
'CaseFact',
'advocate_empanellments_id',
'uid'
];

}
