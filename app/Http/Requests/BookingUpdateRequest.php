<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookingUpdateRequest extends FormRequest
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
            "id" => "required|numeric",
            // "customer_id",
            "garage_id" => "required|numeric",
            "automobile_make_id" => "required|numeric",
            "automobile_model_id" =>"required|numeric",
            "car_registration_no" => "required|string",
            "status"=>"nullable|string",
            "additional_information" => "nullable|string",

            "job_start_time" => "nullable|date",
            "job_end_time" => "nullable|date",

    'booking_sub_service_ids' => 'required|array',
    'booking_sub_service_ids.*' => 'required|numeric',

        ];
    }
}
