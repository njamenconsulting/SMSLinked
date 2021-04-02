<?php

    namespace App\Http\Controllers;
    namespace App\Services; // Your helpers namespace

    use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Redirect;

//

    Class HelperService
    {
      /*
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

        public static function get2DArrayFromCsv($file,$delimiter) {
            if (($handle = fopen($file, "r")) !== FALSE) {
                $i = 0;
                while (($lineArray = fgetcsv($handle, 4000, $delimiter)) !== FALSE) {
                    for ($j=0; $j<count($lineArray); $j++) {
                        $data2DArray[$i][$j] = $lineArray[$j];
                    }
                    $i++;
                }
                fclose($handle);
            }
            return $data2DArray;
        }

        public function getCsvContents(UploadedFile $filename, $delimiter)
        {
            // The nested array to hold all the arrays
            $data_row = [];

            // Open the file for reading
            if (($h = fopen($filename, "r")) !== FALSE)
            {
                // Each line in the file is converted into an individual array that we call $data
                // The items of the array are comma separated
                while (($data = fgetcsv($h, 1000, $delimiter)) !== FALSE)
                {
                    // Each individual array is being pushed into the nested array
                    $data_row[] = $data;
                }

                // Close the file
                fclose($h);
            }
//dd($data_row);
            return $data_row;
        }

    }
