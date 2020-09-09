<?php

namespace App\Traits;

trait InteractsWithWooResponses
{

  /**
   * Decode the Response
   * @return stdClass
   */
  public function decodeResponse($response) {

    $decodedResponse = json_decode($response);

    return $decodedResponse->data ?? $decodedResponse;
  }

  /**
   * Resolve the Response Fails
   * @return void
   */
  public function checkIfErrorResponse($response)
  {
    if(isset($response->error)) {
      throw new \Exception("Something Went Wrong : {$response->error}");
    }
  }
}
