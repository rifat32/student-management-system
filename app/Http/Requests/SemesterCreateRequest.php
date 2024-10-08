<?php


namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;
use App\Rules\ValidateSemesterName;

class SemesterCreateRequest extends BaseFormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return  bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return  array
     */
    public function rules()
    {

        $rules = [

            'name' => [
                'required',
                'string',
            ],

            'start_date' => [
                'required',
                'date',
            ],

            'end_date' => [
                'required',
                'date',
            ],


            'break_start_date' => [
                'nullable',
                'date',
            ],

            'break_end_date' => [
                'nullable',
                'date',
            ],


            'course_ids' => [
                'present',
                'array',
            ],

            'course_ids.*' => [
               "numeric",
               "exists:course_titles,id"
            ],


        ];



        return $rules;
    }
}
