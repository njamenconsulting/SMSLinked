<?php

namespace App\Http\Requests\Contacts;

use Illuminate\Foundation\Http\FormRequest;

class CreateContactRequest extends FormRequest
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
            'contact_phone1' => ['bail','required','regex:/^(2|6)([0-9]{8})$/','unique:contacts'],
            'contact_campus' => ['bail','required',Rule::in(['bangangte', 'douala', 'yaounde'])],
            'contact_email' => ['bail','required','email','max:255','unique:contacts'],
            'group_id' => ['bail','required','exists:App\Models\Group,id'],
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
