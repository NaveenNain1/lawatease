<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmpanellmentDocuments extends Model
{
    use HasFactory;
    protected $table="empanellment_documents";
    protected $fillable=[
'type',
'file',
'advocate_empanellments_id',
'uid',
    ];
}
