<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankDetails extends Model
{
    use HasFactory;
         protected $table="bank_details";

    protected $fillable = [
'bank_name',
'account_no',
'ifsc_no',
'account_holder_name',
'branch_address',
'cancelled_cheque',
'uid',
    ];
}
