<?php

namespace App\Services;

use App\Providers\AppServiceProvider;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Traits\ConsumesExternalServices;
use App\Traits\InteractsWithWooResponses;
use App\Traits\AuthorizesWooRequests;

class WoocommerceService
{
  use ConsumesExternalServices, AuthorizesWooRequests, InteractsWithWooResponses;

    /**
     * The Urls which we should send the request //
     * @return string
     */
     protected $baseUri;

     public function __construct()
     {
       $this->baseUri = config('woocommerce.store_url');
     }

     /**
      * Get All Products from the api
      * @return stdClass
      */

     public function getProducts()
     {
       return $this->makeRequest('GET', 'products');
     }

     /**
      * Get A Single Product from the api
      * @return stdClass
      */

     public function getProduct($id)
     {
       return $this->makeRequest('GET', "products/{$id}");
     }

     /**
      * Get All Categories from the api
      * @return stdClass
      */
     public function getCategories()
     {
       return $this->makeRequest('GET', 'categories', [],[],[]);
     }

     /**
      * Get All Products in a single Category  from the api
      * @return stdClass
      */

     public function getCategoryProducts($id)
     {
       return $this->makeRequest('GET', "categories/{$id}/products");
     }
  }
