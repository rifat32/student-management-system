<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PayrollHoliday extends Model
{
    use HasFactory;
    protected $fillable = [
        'payroll_id',
        'holiday_id',
    ];

    public function payroll()
    {
        return $this->belongsTo(Payroll::class, 'payroll_id');
    }

    public function holiday()
    {
        return $this->belongsTo(Holiday::class, 'holiday_id');
    }

}
