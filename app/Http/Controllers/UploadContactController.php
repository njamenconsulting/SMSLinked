<?php

namespace App\Http\Controllers;

use App\Http\Requests\Contacts\UploadedContactRequest;

use App\Repositories\ContactRepositoryInterface;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;


class UploadContactController extends Controller
{
    /**
     * @var ContactRepositoryInterface
     */
    private $contactRepository;

    public function __construct(ContactRepositoryInterface $contactRepository)
    {
        $this->contactRepository = $contactRepository;
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return
     */
    public function create()
    {
        return view('contents.contacts.uploads.contact_upload_create');
    }
    /**
     * Show contain of uploaded csv file to the form for creating a new resource.
     *
     * @return
     */
    public function upload(Request $request)
    {

        //Determine if a file is present on the request
        if ($request->hasFile('upload-file')) {
            //Retrieve csv file
            $uploaded_csv_file = $request->file('upload-file');
            //Set delimiter
            $delimiter =';';

            //verify that there were no problems uploading the file
            if ($uploaded_csv_file->isValid()) {

                // Run validation with input file
                $validator = app('CsvHeaderValidator')::validateHeader($uploaded_csv_file, $delimiter);

                if ($validator->fails()) {

                    return redirect()->route('upload.create')->withErrors($validator);
                }
                //Convert Csv uploaded file into array
                $data = app('CsvToArrayConverter')::getArrayFromCSVFile( $uploaded_csv_file ,$delimiter);

               //Store file contains into cache for next form request
                $cache_key = 'csvdata' .Auth::id();
                Cache::put($cache_key, $data, $seconds = 1000);

                //Redirect to
                return redirect()->route('upload.display');
            }
        }
        else return redirect()->route('upload.create')->with('error', 'Please ensure you that you are provided  a CSV file for import');
    }
    /**
     * Displaying Csv file contains in view form to any ajusting and modification
     *
     * Data from cache and send in view display_csv_content
     * @return \Illuminate\Http\Response
     */
    public function display()
    {
        $cache_key = 'csvdata' .Auth::id();

        if(Cache::has($cache_key)) {

            $data = Cache::get($cache_key);
            return view('contents.contacts.uploads.contact_upload_display', ['contacts' => $data]);
        }

        else
            return redirect() -> route('upload.create');

    }
    /**
     * Store a content of csv file into DB.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UploadedContactRequest $request)
    {
        //$inputs = $request->only('contact_firstname.*', 'contact_lastname.*', 'contact_phone1.*', 'contact_phone2.*', 'contact_email.*','group_code.*');

        $inputs = $request->except(['_token']);

        $this->contactRepository->storeCsvContents($inputs);

        return redirect()->route('upload.create')->with('success', 'Your Cvs File has been uploaded and '. count($inputs) . ' contacts have been created successfully');

    }
}
