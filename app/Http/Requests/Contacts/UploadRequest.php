<?php

namespace App\Http\Requests\Contacts;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Symfony\Component\Console\Input\Input;

class UploadRequest extends FormRequest
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
        //DB::table('groups')->where('group_code', '=','group_code.*')->first()
        foreach($this->request->get('contact_firstname') as $key => $val)
        {
            $rules['contact_firstname.'.$key] = 'required|max:255';
        }
        foreach($this->request->get('contact_lastname') as $key => $val)
        {
            $rules['contact_lastname.'.$key] = 'nullable|max:255';
        }

        $rules['contact_phone1.*'] = ['bail','required','distinct:strict','regex:/^(2|6)([0-9]{8})$/','unique:contacts,contact_phone2,contact_phone1'];

        $rules[ 'contact_phone2.*'] = ['bail','nullable','distinct:strict','regex:/^(2|6)([0-9]{8})$/','unique:contacts,contact_phone2,contact_phone1'];

        $rules['contact_email.*'] = ['bail','required','email','distinct:strict','max:255','unique:contacts,contact_email'];

        $rules['group_code.*'] = ['bail','required','distinct:strict'];

        //
        foreach($this->request->get('group_name') as $key => $val)
        {
            $group_code = $this->request->get('group_code');
            $rules['group_name.'.$key] = [Rule::requiredIf(['$group_code[$key]' => 'exists:groups,group_code']),'max:255'];
        }
        //
        foreach($this->request->get('group_description') as $key => $val)
        {
            $group_code = $this->request->get('group_code');
            $rules['group_description.'.$key] = ['exclude_if:exists:groups,group_code,false,max:255'];
        }
        return $rules;
    }
}
