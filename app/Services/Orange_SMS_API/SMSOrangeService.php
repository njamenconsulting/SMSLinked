<?php
#App/Services/Orange_SMS_API/SMSOrangeService.php

namespace App\Services\Orange_SMS_API;
use App\Services\Orange_SMS_API\OAuth2OrangeService;
use Illuminate\Support\Facades\Http;

use Exception;
use InvalidArgumentException;

class SMSOrangeService
{
    private $_recipient_phone; //recipient phone number
    private $_sender_phone; // sender phone number ou dev phone number
    private $_sender_name = '';
    private $_message_text;  // The content of the SMS, must not exceed 160 character

    public function __construct($parameters =array()){
        //dd($parameters);OK
        if (array_key_exists('recipient_phone', $parameters)) {
            $this->setRecipientPhoneNumber($parameters['recipient_phone']);
        }
        if (array_key_exists('sender_phone', $parameters)) {
            $this->setSenderPhoneNumber($parameters['sender_phone']);
        }
        if (array_key_exists('message_text', $parameters)) {
            $this->setSmsTextMessage($parameters['message_text']);
        }
        if (array_key_exists('sender_name', $parameters)) {
            $this->getSmsTextMessage($parameters['sender_name']);
        }
    }

    /**
     * This below function allow Send SMS
     */
    public function send(){

        $smsParameters = array("outboundSMSMessageRequest" => array(
            "address" => $this->getRecipientPhoneNumber(),
            "senderAddress" => $this->getSenderPhoneNumber(),
            "outboundSMSTextMessage"=> array(
                                            "message"  => $this->getSmsTextMessage()
                                            )
            )
        );

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' .(new OAuth2OrangeService())->getAccessToken()
        ])->withOptions([
            'verify' => false, //To avoid SSL certificate problem
        ])->withBody(json_encode($smsParameters), 'application/json'
        )->post('https://api.orange.com/smsmessaging/v1/outbound/'.urlencode($this->getSenderPhoneNumber()).'/requests');
        $data = $response->json();
        dd($data);
    }

    //
    public function getRecipientPhoneNumber(){
        return $this->_recipient_phone;
    }
    //
    public function setRecipientPhoneNumber($recipientPhoneNumber){
        $this->_recipient_phone = $recipientPhoneNumber;
    }
    //
    public function getSenderPhoneNumber(){
        return $this->_sender_phone;
    }
    //
    public function setSenderPhoneNumber($senderPhoneNumber){
        $this->_sender_phone = $senderPhoneNumber;
    }
    //
    public function getSmsTextMessage(){
        return $this->_message_text;
    }
    //
    public function setSmsTextMessage($smsTextMessage){
        $this->_message_text = $smsTextMessage;
    }
    //
    public function getSenderName(){
        return $this->_sender_name;
    }
    //
    public function setSenderName($senderName){
        $this->_sender_name = $senderName;
    }
}
