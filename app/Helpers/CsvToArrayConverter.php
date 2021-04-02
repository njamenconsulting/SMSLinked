<?php


namespace App\Helpers;


use Illuminate\Http\UploadedFile;

class CsvToArrayConverter
{
    /* * Convert a comma separated file into an associated array.
     * The first row should contain the array keys.
     *
     * @param string $filename Path to the CSV file
     * @param string $delimiter The separator used in the file
    */
    public static function getArrayFromCSVFile(UploadedFile $filename, $delimiter)
    {
        if(!file_exists($filename) || !is_readable($filename))
            return FALSE;

        $header = NULL;
        $data = array();
        if (($handle = fopen($filename, 'r')) !== FALSE)
        {
            while (($row = fgetcsv($handle, 1000, $delimiter)) !== FALSE)
            {
                if(!$header)
                    $header = $row;
                else
                    $data[] = array_combine($header, $row);
            }
            fclose($handle);
        }
        return $data;
    }

}
