<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExistingEmpanelment extends Model
{
    use HasFactory;
        protected $table="existing_empanelments";

    protected $fillable = [
'name',
'EmpanelledSince',
'EmpanelmentLetter',
'ReferenceName',
'ReferenceMobile',
'advocate_empanellments_id',
'uid'
    ];
}
