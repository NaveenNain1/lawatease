<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class beneficiary extends Model
{
    use HasFactory;
    protected $table="beneficiaries";

    protected $fillable = [
    	'name_of_legal_entity',
'nature_of_entity',
'cin',
'registration_date',
'gst_no',
'designation',
'business_entity_registration_certificate',
'pan_card',
'address_proof',
'gst_certificate',
'authorization_letter',
'dob_proof',
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
'is_business_entity',

    ];
}
