<?php

namespace App\Services;

use App\Traits\ConsumesExternalServices;
use App\Traits\InteractsWithWooResponses;

class WooAuthenticationService
{
  use ConsumesExternalServices, InteractsWithWooResponses;

   /**
    * The Urls which we should send the request //
    * @return string
    */
    protected $baseUri;

    /**
     * the consumer key for the user
     * @return string
     */
     protected $consumerKey;

     /**
      * The client secret for the user//
      * @return string
      */
      protected $consumerSecret;



      public function __construct()
      {
          $this->baseUri = config('woocommerce.store_url');
          $this->consumerKey = config('woocommerce.consumer_key');
          $this->consumerSecret = config('woocommerce.consumer_secret');
      }

      /**
       * Obtains an access token associated with the client
       * @return stdClass
       */

     public function getClientCredentialsToken() {

       if($token = $this->existingValidToken()){
         return $token;
       }

      $formParams =
      [
         'grant_type' => 'client_credentials',
         'store_url'=> $this->baseUri,
         'consumer_key' =>$this->consumerKey,
         'consumer_secret' => $this->consumerSecret,
       ];

          $tokenData = $this->makeRequest('POST', 'wc-auth/v1/authorize', [], $formParams);


       $this->storeValidToken($tokenData, 'client_credentials');
            //dd($tokenData->access_token);
     return $tokenData->access_token;

    }

    /**
     * Generate the URL to obtain users authorization
     * @return string
     */
    public function resolveAuthorizationUrl()
    {
        $query = http_build_query([
          'app_name' => config('services.woocommerce.app_name'),
          'user_id'=> $this->consumerKey,
          'return_url' => route('authorization'),
          'callback_url' => route('callback'),
          'scope' => 'read_write',
        ]);


          return "{$this->baseUri}/wc-auth/v1/authorize?{$query}";
    }
  //          'response_type' => 'code',

  /**
   * Obtains an access token from a given code
   * @return stdClass
   */
  public function getCodeToken($code)
  {
      $formParams = [
          'grant_type' => 'authorization_code',
          'consumer_key' => $this->consumerKey,
          'consumer_secret' => $this->consumerSecret,
          'redirect_uri' => route('authorization'),
          'code' => $code,
      ];


 $tokenData = $this->makeRequest('POST', 'oauth/token', [], $formParams);

 $this->storeValidToken($tokenData, 'authorization_code');

 return $tokenData;


}

/**
 *  Save a valid token for re-use until expiry
 * @return void
 */

    public function storeValidToken($tokenData, $grantType)
    {
      $tokenData = $tokenData->token_expires_at->now(addSeconds($tokenData->expires_in -5));

      $tokenData->accessToken = "{$tokenData->token_type} {$tokenData->access_token}";

      $tokenData->grantType = $grantType;

      session()->put(['current_token' => $tokenData]);


    }

    public function existingValidToken() {
      if(session()->has('current_token')) {
        $tokenData = session('current_token');
        if(now()->lt($tokenData->token_expires_at)){
          return $tokenData->accessToken;
        }
      }
      return false;
    }
  }
