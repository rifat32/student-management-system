<?php


namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;
use App\Rules\ValidateClassRoutineName;

class ClassRoutineCreateRequest extends BaseFormRequest
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

            'day_of_week' => [
                'required',
                'numeric',
            ],

            'start_time' => [
                'required',
                'string',

            ],

            'end_time' => [
                'required',
                'string',


            ],

            'room_number' => [
                'required',
                'string',


            ],

            'subject_id' => [
                'required',
                'numeric',
                'exists:subjects,id'

            ],
            'course_id' => [
                'required',
                'numeric',
                'exists:course_titles,id',
            ],


            'teacher_id' => [
                'required',
                'numeric',
                "exists:users,id"

            ],

            'semester_id' => [
                'nullable',
                'numeric',
                "exists:semesters,id"

            ],
            'session_id' => [
                'nullable',
                'numeric',
                "exists:sessions,id"

            ],




        ];



        return $rules;
    }
}
