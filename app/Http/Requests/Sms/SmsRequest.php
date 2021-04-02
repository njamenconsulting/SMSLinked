<?php

namespace App\Http\Requests\Sms;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class SmsRequest extends FormRequest
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
          'sms_recipients' => [ Rule::requiredIf(!filled($_POST['group_id'])),'bail','nullable','regex:/^(((2|3|6)[1-9]{8})|((2|3|6)[1-9]{8}[-; ])){1,}$/'],//,'regex:/(^(2|6)([;. ]?[0-9]{8})$){1,}/'],
          'sms_message' => ['bail','required','max:255'],
          'group_id' =>[ Rule::requiredIf(!filled((Request())->sms_recipients)),'bail','nullable','exists:groups,id'],
        ];
    }
    //
    public function attributes()
    {
        return [
            'sms_recipients' => 'Recipient(s) Phone(s)',
            'sms_message'=> 'SMS Text Message',
            'group_id'=> 'Group\'s Recipient',
        ];

    }
}
