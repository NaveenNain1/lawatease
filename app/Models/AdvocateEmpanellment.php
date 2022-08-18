<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdvocateEmpanellment extends Model
{
    use HasFactory;
          protected $table="advocate_empanellments";

    protected $fillable = [
'first_name',
'middle_name',
'last_name',
'father_name',
'bar_council_enrollment_no',
'date_of_bar_council_enrollment',
'email_id',
'mobile_number',
'whatsapp_no',
'dob',
'gender',
'marital_status',
'aadhar_no',
'pan_no',
'gst_no',
'permanent_addresses_id',
'correspondance_addresses_id',
'uid',
'is_submitted',
'is_verified',
'uid',
    ];
}
