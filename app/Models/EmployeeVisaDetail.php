<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeVisaDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'business_id',
        'BRP_number',
        "visa_issue_date",
        "visa_expiry_date",
        "place_of_issue",
        "visa_docs",
        'created_by'
    ];

    public function employee(){
        return $this->hasOne(User::class,'id', 'user_id');
    }


    protected $casts = [
        'visa_docs' => 'array',

    ];




    public function getCreatedAtAttribute($value)
    {
        return (new Carbon($value))->format('d-m-Y');
    }
    public function getUpdatedAtAttribute($value)
    {
        return (new Carbon($value))->format('d-m-Y');
    }




    public function getVisaIssueDateAttribute($value)
    {
        return (new Carbon($value))->format('d-m-Y');
    }
    public function getVisaExpiryDateAttribute($value)
    {
        return (new Carbon($value))->format('d-m-Y');
    }



}
