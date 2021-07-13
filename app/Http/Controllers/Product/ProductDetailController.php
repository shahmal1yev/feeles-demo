<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\ProductDetail\StoreRequest as ProductDetailStoreRequest;
use App\Http\Requests\ProductDetail\UpdateRequest as ProductDetailUpdateRequest;

use App\Models\Product\ProductDetail;

use App\Models\Product\Product;

class ProductDetailController extends Controller
{
    public function details(        
        Product $product
    )
    {
        $requestAttributes = ProductDetailUpdateRequest::requestAttributes();

        return view('admin.pages.stock.product-stock', compact(
            'product',
            'requestAttributes'
        ));
    }

    public function update(
        ProductDetailUpdateRequest $request,
        ProductDetail $productDetail
    )
    {
        $attributes = $request::requestAttributes();

        $result = $productDetail->update([
            'sizeId' => $request->{$attributes['sizeID']},
            'colorId' => $request->{$attributes['colorID']},
            'fabricId' => $request->{$attributes['fabricID']},
            'classGroupId' => $request->{$attributes['classID']},
            'stock' => $request->{$attributes['stock']}
        ]);

        $message = [
            'success' => __('message.updatedData', [
                'label' => 'Product detail'
            ]),
            'error' => __('message.error')
        ];

        if ($request->expectsJson())
        {
            if ($result)
            {
                return response([
                    'message' => $message['success']
                ]);
            }
            else
            {
                return response([
                    'message' => $message['error']
                ], 500);
            }
        }

        if ($result)
        {
            return back()->with('message', $message['success']);
        }

        return back()->withErrors('message', $message['error']);
    }

    public function remove(
        Request $request,
        ProductDetail $productDetail
    )
    {
        $result = $productDetail->delete();
        
        $message = [
            'success' => __('message.deletedData', [
                'label' => 'Product detail'
            ]),
            'error' => __('message.error')
        ];

        if ($request->expectsJson())
        {
            if ($result)
            {
                return response([
                    'message' => $message['success'],
                ]);
            }

            return response([
                'message' => $message['error']
            ], 500);
        }

        if ($result)
        {
            return back()->with('message', $message);
        }

        return back()->withErrors('message', $message);
    }

    public function new(
        Product $product
    )
    {
        $requestAttributes = ProductDetailStoreRequest::requestAttributes();
        
        return view('admin.pages.stock.new', compact(
            'product',
            'requestAttributes'
        ));
    }

    public function store(
        ProductDetailStoreRequest $request,
        Product $product
    )
    {
        $attributes = $request::requestAttributes();
        $message = [
            'success' => __("message.savedData", [
                'label' => __('Product detail')
            ]),
            'error' => __("message.error")
        ];

        $detail = ProductDetail::firstWhere([
            'productId' => $product->id,
            'sizeId' => $request->{$attributes['sizeID']},
            'colorId' => $request->{$attributes['colorID']},
            'fabricId' => $request->{$attributes['fabricID']},
            'classGroupId' => $request->{$attributes['classID']}
        ]);

        if ($detail)
        {
            $result = $detail->update([
                'stock' => $request->{$attributes['stock']},
                'discount' => $request->{$attributes['discount']}
            ]);
        }
        else
        {
            $result = ProductDetail::create([
                'productId' => $product->id,
                'sizeId' => $request->{$attributes['sizeID']},
                'colorId' => $request->{$attributes['colorID']},
                'fabricId' => $request->{$attributes['fabricID']},
                'classGroupId' => $request->{$attributes['classID']},
                'stock' => $request->{$attributes['stock']},
                'discount' => $request->{$attributes['discount']},
            ]);
        }

        if ($request->expectsJson())
        {
            if ($result)
            {
                return response([
                    'message' => $message['success']
                ]);
            }

            return response([
                'message' => $message['error']
            ], 500);
        }

        if ($result)
        {
            return back()->with('message', $message['success']);
        }

        return back()->withErrors('message', $message['error']);
    }
}
