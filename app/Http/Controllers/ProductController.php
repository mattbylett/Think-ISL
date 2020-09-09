<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
  /**
   * Show the application dashboard.
   *
   * @return \Illuminate\Contracts\Support\Renderable
   */
  public function showProduct($title, $id)
  {
    $product = $this->woocommerceService->getProduct($id);

    return view('woocommerce.products.show')
      ->with([
        'product' => $product,
      ]);
    }

}
