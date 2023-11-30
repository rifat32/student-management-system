<?php

namespace App\Http\Requests;

use App\Models\Department;
use Illuminate\Foundation\Http\FormRequest;

class HolidayCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string',
            'description' => 'nullable|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'repeats_annually' => 'required|boolean',
            'departments' => 'present|array',
            'departments.*' => [
                'numeric',
                function ($attribute, $value, $fail) {
                    $exists = Department::where('id', $value)
                        ->where('departments.business_id', '=', auth()->user()->business_id)
                        ->exists();

                    if (!$exists) {
                        $fail("$attribute is invalid.");
                    }
                },
            ],
        ];
    }
}