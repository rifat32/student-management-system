<?php



namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;
use App\Rules\ValidateSessionName;
use Illuminate\Validation\Rule;

class SessionCreateRequest extends BaseFormRequest
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
    Rule::unique('sessions')->where('business_id', auth()->user()->business_id)
],

        'start_date' => [
        'required',
        'date',
    ],

        'end_date' => [
        'required',
        'date',
        'after_or_equal:start_date'
    ],

        'holiday_dates' => [
        'present',
        'array',

    ],


];



return $rules;
}
}


