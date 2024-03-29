<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payroll extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        "payrun_id",
        'regular_hours',
        'overtime_hours',
        'regular_hours_salary',
        'overtime_hours_salary',
        'status',
        'is_active',
        'business_id',
        'created_by',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];



    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function payrun()
    {
        return $this->belongsTo(Payrun::class, 'payrun_id');
    }

    public function business()
    {
        return $this->belongsTo(Business::class, 'business_id');
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
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
