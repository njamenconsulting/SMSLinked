<?php
#app/Services/Orange_SMS_API/OAuth2OrangeService.php

namespace App\Services\Orange_SMS_API;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class OAuth2OrangeService
{
    protected  $_client_id; //a unique ID provided by the Orange back-end server to identify your client application
    protected  $_client_secret; //it is used to sign/encrypt the requests and must be shared by the client and server

    const BASE_URL = 'https://api.orange.com';

    /**
     *  This below function allow to get OAuth access token   
     *  @param string client_id
     *  @param string client_secret
     *
     *  Send POST Request to get access_token from Authorization Server and store it in cache
     *  Return void
     */
    public function requestTokenFromAuthServer()
    {
           //Retrieve credentials from Services\service.php
        $this->setClientId(config('services.orange.client_id'));
        $this->setClientSecret(config('services.orange.client_secret'));
       
        //
        $authorization_header = 'Basic '. base64_encode($this->getClientId().':'.$this->getClientSecret());
    
        $response = Http::withHeaders([
            'Authorization' => $authorization_header,
            'Accept'=>  'application/json'
        ])->withOptions([
            'verify' => false, //To avoid SSL certificate problem
        ])->withBody('grant_type=client_credentials', 'application/x-www-form-urlencoded'
        )->post('https://api.orange.com/oauth/v3/token');

        //Retrieves response and convert it to array
        $data = $response->json(); 

        // Store data in cache while access token expired
        $this->storeToken($data);
    }
    /**
     *  Retrieve access_token value from the cache or, if access token has expired
     *  request a new access token and add them to the cache
     *
     *  Return access_token whith valid expire_in value
     */
    public function getAccessToken()
    {
        return Cache::remember('access_token', Cache::get('expires_in'), function () {
            $this->requestTokenFromAuthServer();
            return Cache::get('access_token');
        });
    }

    /**
     * Allow to Use put method on the Cache facade to store  parameters to the entity-body of the HTTP response in the cache
     * @param array which contains HTTP response issued by Orange Authorization Server
     *
     * @Return  Void
     */
    public function storeToken($data = array())
    {
        if (array_key_exists('expires_in', $data)) {
            Cache::put('expires_in', $data['expires_in'], $data['expires_in']);
            //
            if (array_key_exists('access_token', $data)) {
                Cache::put('access_token', $data['access_token'], $data['expires_in']);
            }
        }
    }

/**
 * Setter and Getter classes's attributes
 */
    public function setClientId($clientId){
        $this->_client_id = $clientId;
    }
    //
    public function getClientId(){
        return $this->_client_id;
    }
    //
    public function setClientSecret($clientSecret){
        $this->_client_secret = $clientSecret;
    }
    //
    public function getClientSecret(){
        return $this->_client_secret;
    }
}
