<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdvocateCases extends Model
{
    use HasFactory;
  protected  $table="advocate_cases";
protected $fillable=[
'PlaintiffName',
'DefendantName',
'CourtName',
'Dist',
'State',
'CourtCaseNo',
'FillingDate',
'LAETMCaseNo',
'LAETMCin',
'PresentStatus',
'NextDateofHearing',
'Remarks',
'uid',
];
}
