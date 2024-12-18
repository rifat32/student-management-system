<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Business extends Model
{

    use HasFactory,  SoftDeletes;

    protected $connection = 'default';
    protected $fillable = [
        "student_disabled_fields",
        "student_optional_fields",

        "name",
        "url",
        "about",
        "web_page",
        "phone",
        "email",
        "additional_information",
        "address_line_1",
        "address_line_2",
        "lat",
        "long",
        "country",
        "city",
        "currency",
        "postcode",
        "logo",
        "image",
        "background_image",
        "status",
         "is_active",



        "business_tier_id",
        "owner_id",
        'created_by'

    ];

    protected $casts = [


        'student_disabled_fields' => 'array',
        'student_optional_fields' => 'array'



    ];

    public function owner(){
        return $this->belongsTo(User::class,'owner_id', 'id');
    }


    public function business_tier(){
        return $this->belongsTo(businessTier::class,'business_tier_id', 'id');
    }




    public function default_work_shift(){
        return $this->hasOne(WorkShift::class,'business_id', 'id')->where('is_business_default',1);
    }

    public function times(){
        return $this->hasMany(BusinessTime::class,'business_id', 'id');
    }


    public function getCreatedAtAttribute($value)
    {
        return (new Carbon($value))->format('d-m-Y');
    }
    public function getUpdatedAtAttribute($value)
    {
        return (new Carbon($value))->format('d-m-Y');
    }























































}
