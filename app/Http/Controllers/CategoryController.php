<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{

      /**
       * Show the Products in a given Category
       *
       * @return \Illuminate\Contracts\Support\Renderable
       */
      public function showCategoryProducts($title, $id)
      {
        $product = $this->woocommerceService->getCategoryProducts($id);

        return view('woocommerce.categories.show')
          ->with([
            'products' => $products,
          ]);



  }
}
