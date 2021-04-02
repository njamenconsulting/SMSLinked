<?php

namespace App\Http\Controllers;

use App\Models\Sms;
use Illuminate\Http\Request;
use App\Http\Requests\Sms\SmsRequest;
use App\Repositories\SmsRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Arr;

use App\Services\Orange_SMS_API\OAuth2OrangeService;
use App\Services\Orange_SMS_API\SMSOrangeService;

use App\Models\Group;

use Illuminate\Support\Str;

class SmsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $groups = DB::table('groups')->get();
        return view('contents.sms.create_sms',compact('groups'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SmsRequest $request)
    {

         if($request->filled('sms_recipients') && $request->filled('group_id'))
         {
             $collection1 = Str::of($request->input('sms_recipients'))->explode(';');
             $collection2=Group::find($request->input('group_id'))->contacts()
                                                                  ->select('contact_phone1')
                                                                  ->get();

             $recipients_phone = Arr::flatten(array_merge($collection1->toArray(),$collection2->toArray()));
             echo 'sms_recipients and  groupid';
            
         }
         else {
           if ($request->filled('sms_recipients')) {
              $collection1 = Str::of($request->input('sms_recipients'))->explode(';');
              $recipients_phone = Arr::flatten($collection1->toArray());
              echo 'only sms_recipients';

           }
           //
           if ($request->filled('group_id')) {
                 $collection2=Group::find($request->input('group_id'))->contacts()
                                                                      ->select('contact_phone1')
                                                                      ->get();
                $recipients_phone = Arr::flatten($collection2->toArray());
                echo 'only  groupid   ';

           }
         }

        foreach ($recipients_phone as $key => $recipient_phone) {
          echo $recipient_phone; echo "<br><br>";

          $parameters = array(
                                  'recipient_phone' => 'tel:+237'.$recipient_phone,//CMR phone number SMSAPI
                                  'sender_phone' => 'tel:+237'.'694279933',
                                  'message_text' => $request->input('sms_message'),
                                  'sender_name' => '',
                              );
           (new SMSOrangeService($parameters))->send();
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sms  $sms
     * @return \Illuminate\Http\Response
     */
    public function show(Sms $sms)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sms  $sms
     * @return \Illuminate\Http\Response
     */
    public function edit(Sms $sms)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sms  $sms
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sms $sms)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sms  $sms
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sms $sms)
    {
        //
    }
}
