<?php

namespace App\Traits;

use App\Services\WooAuthenticationService;

trait AuthorizesWooRequests
{

   /**
    * Resolve the elements to send when Authorizing the request
    *@return void
    */
     public function resolveAuthorization(&$queryParams, &$formParams, &$headers)
     {
       $accessToken = $this->resolveAccessToken();

       $headers['Authorisation'] = $accessToken;

     }

     /**
      * Resolve a valid access token to use
      * @return string
      */

     public function resolveAccessToken() {

       $authenticationService = resolve(WooAuthenticationService::class);

       return $authenticationService->getClientCredentialsToken();

    }
}
