<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class beneficiary extends Model
{
    use HasFactory;
    protected $table="beneficiaries";

    protected $fillable = [
'first_name',
'middle_name',
'last_name',
'father_name',
'mother_name',
'spouse_name',
'email_id',
'mobile_number',
'whatsapp_no',
'dob',
'gender',
'marital_status',
'aadhar_no',
'pan_no',
'driving_licence_no',
'aadhar_card',
'photo_beneficiary',
'driving_licence',
'uid',
'is_verified',
    ];
}
