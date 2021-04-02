<?php

namespace App\Http\Requests\Contacts;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateContactRequest extends FormRequest
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
            'contact_firstname' => ['bail','required','max:255'],
            'contact_lastname' => ['bail','nullable','max:255'],
            'contact_phone1' => ['bail','required','regex:/^(2|6)([0-9]{8})$/',Rule::unique('contacts', 'contact_phone1')->ignore($this->contact)],
            'contact_phone2' =>['bail','nullable','regex:/^(2|6)([0-9]{8})$/',Rule::unique('contacts', 'contact_phone2')->ignore($this->contact)],
            'contact_email' => ['bail','required','email','max:255',Rule::unique('contacts', 'contact_email')->ignore($this->contact)],
            'group_id' => ['bail','required','exists:groups,id'],
        ];
    }

    public function attributes()
    {
        return [
            'contact_firstname' => 'Firstname',
            'contact_lastname' => 'Lastname',
            'contact_phone1' => 'First Phone Number',
            'contact_phone2' => 'Second Phone Number',
            'contact_email' => 'Email Address',
            'group_id' => 'Group'
        ];
    }
}
