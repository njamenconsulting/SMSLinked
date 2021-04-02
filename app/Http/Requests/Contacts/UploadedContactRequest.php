<?php

namespace App\Http\Requests\Contacts;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UploadedContactRequest extends FormRequest
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
        $group_code = $this->request->get('group_code');
        return [

            'contact_firstname.*' => ['bail','required','max:255'],
            'contact_lastname.*' => ['bail','nullable','max:255'],
            'contact_phone1.*' => ['bail','required','distinct:strict','regex:/^(2|6)([0-9]{8})$/','unique:contacts,contact_phone1,contact_phone2'],
            'contact_phone2.*' =>['bail','nullable','distinct:strict','regex:/^(2|6)([0-9]{8})$/','unique:contacts,contact_phone2,contact_phone1'],
            'contact_email.*' => ['bail','required','email','distinct:strict','max:255','unique:contacts,contact_email'],
            'group_code.*' => ['bail','required','exists:groups,group_code'],

        ];
    }

    public function attributes()
    {

        return [
            'contact_firstname.*' => ' This Firstname ',
            'contact_lastname.*' => ' This Lastname',
            'contact_phone1.*' => 'This Phone Number',
            'contact_phone2.*' => 'This Phone Number',
            'contact_email.*' => 'This Email Address',
            'group_code.*' => 'Group'
        ];
    }
    public function messages()
    {
        $messages = [];
        foreach($this->request->get('group_code') as $key => $val)
        {
            $messages['group_code.'.$key.'.exists'] = 'Please create this Group before and put his Code here';
        }

        foreach($this->request->get('contact_email') as $key => $val)
        {
            $messages['contact_email.'.$key.'.unique'] = 'This email address already exist';
        }

        return $messages;
    }
}
