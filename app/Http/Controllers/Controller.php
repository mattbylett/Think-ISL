<?php

namespace App\Http\Controllers;

//use Auth;
use Illuminate\Support\Facades\Auth;
use App\Services\WoocommerceService;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
  use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

  /**
   * The market service to consume from this client
   * @var App\Services\WoocommerceService
   */
    protected $woocommerceService;

    public function __construct(WoocommerceService $woocommerceService)
    {
        $this->woocommerceService = $woocommerceService;
    }
}
