<?php


namespace App\Helpers;


use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Factory as ValidationFactory;

class CsvHeaderValidator
{
    /**
     * Validator object
     * @var \Illuminate\Validation\Factory
     */
    private static $validator;

    /**
     * Validation rules for CsvImport
     *
     */
    private static $rules = [
        'csv_extension'     => 'in:csv',
        'firstname_key' => 'required',
        'lastname_key'  => 'required',
        'phone1_key'   => 'required',
        'phone2_key' => 'required',
        'email_key'  => 'required',
        'group_code_key' => 'required',
        'group_name_key' => 'nullable',
        'group_description_key' => 'nullable'
    ];

    public static function validateHeader($csv_file_path, $separator)
    {
        // Line endings fix
        ini_set('auto_detect_line_endings', true);

        $csv_extension = $csv_file_path->getClientOriginalExtension();

        $opened_file = fopen($csv_file_path, 'r');
        // Open file into memory
        if ($opened_file === false) {
            throw new Exception('File cannot be opened for reading');
        }

        // Get first row of the file as the header
        $header = fgetcsv($opened_file, 0, $separator);

        // Find first_name column
        $validation_array['firstname_key'] = self::getColumnNameByValue($header, 'firstname');

        // Find last_name column
        $validation_array['lastname_key'] = self::getColumnNameByValue($header, 'lastname');

        // Find last_name column
        $validation_array['phone1_key'] = self::getColumnNameByValue($header, 'phone1');

        // Find last_name column
        $validation_array['phone2_key'] = self::getColumnNameByValue($header, 'phone2');

        // Find email column
        $validation_array['email_key'] = self::getColumnNameByValue($header, 'email');

        // Find group_code column
        $validation_array['group_code_key'] = self::getColumnNameByValue($header, 'group_code');

        // Find group_name column
        $validation_array['group_name_key'] = self::getColumnNameByValue($header, 'group_name');

        // Find group_name column
        $validation_array['group_description_key'] = self::getColumnNameByValue($header, 'group_description');

        // Return validator object
        self::$validator = Validator::make($validation_array, self::$rules, self::messages(),self::attributes());
        return self::$validator;

    }
    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    private static function messages()
    {
        return [
            'firstname_key.required' => 'Please ensure you that the title of 1st column is -firstname-',
            'lastname_key.required' => 'Please ensure you that the title of 2nd column is -lastname-',
            'phone1_key.required' => 'Please ensure you that the title of 3rd column is -phone1-',
            'phone2_key.required' => 'Please ensure you that the title of 4th column is -phone2-',
            'email.required' => 'Please ensure you that the title of 5th column is -email-',
            'group_code_key.required' => 'Please ensure you that the title of 6th column is -group_code-',
            'group_code_name.required' => 'Please ensure you that the title of 6th column is -group_name-',
            'group_description_key.required' => 'Please ensure you that the title of 6th column is -group_description-',
        ];
    }
    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    private static function attributes()
    {
        return [
            'csv_extension' => 'in:csv',
            'firstname_key' => 'firstname',
            'lastname_key'  => 'lastname',
            'phone1_key'   => '1rst phone number',
            'phone2_key' => '2nd phone number',
            'email_key'  => 'email address',
            'group_code_key' => 'group code',
            'group_name_key' => 'group name',
            'group_description_key' => 'group description'
        ];
    }
    //--------------------------------------------------------------------
    /**
     * Attempts to find a value in array or returns empty string
     * @param array  $array hay stack we are searching
     * @param string $key
     *
     */
    private static function getColumnNameByValue($array, $value)
    {
        return in_array($value, $array)? $value : '';
    }


}
