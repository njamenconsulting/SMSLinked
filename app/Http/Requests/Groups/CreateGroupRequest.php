<?php

namespace App\Http\Requests\Groups;

use Illuminate\Foundation\Http\FormRequest;

class CreateGroupRequest extends FormRequest
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
            'group_name'=>['bail', 'required','string','max:100','unique:groups'],
            'group_code'=>['bail','required','string','max:10','unique:groups'],
            'group_description'=>['bail','string','max:255']
        ];
    }
    //
    public function attributes()
    {
        return [
            'group_name' => 'Group\'s Name',
            'group_code'=> 'Group\'s Code',
            'group_description'=> 'Group\'s Description',
        ];

    }
}
