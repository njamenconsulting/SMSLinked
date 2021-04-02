<?php

namespace App\Http\Requests\Groups;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateGroupRequest extends FormRequest
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
        return [    //Rule::unique('users')->ignore($user->id),
            'group_name'=>['required','string','max:100',Rule::unique('groups', 'group_name')->ignore($this->group)],
            'group_code'=>['required','string','max:10',Rule::unique('groups', 'group_code')->ignore($this->group)],
            'group_description'=>['string','max:255'],
            'created_by'=>['string','max:255','exists:users,name'],
            'updated_by'=>['string','max:255','exists:users,name']
        ];
    }
}
