<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
  /**
   * Show the application dashboard.
   *
   * @return \Illuminate\Contracts\Support\Renderable
   */
  public function showWelcomePage()
  {
    $products = $this->woocommerceService->getProducts();
    $categories = $this->woocommerceService->getCategories();

    return view('welcome')
      ->with([
        'products' => $products,
        'categories' => $categories,
      ]);
  }
}
