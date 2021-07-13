<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Product\Product;

class ProductDetailController extends Controller
{
    public function product(
        Request $request,
        Product $product
    )
    {
        return view('admin.pages.stock.product-stock', compact(
            'product'
        ));
    }
}
