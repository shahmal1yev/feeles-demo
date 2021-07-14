<?php

namespace App\Http\Controllers\Size;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\Size\StoreRequest as SizeStoreRequest;
use App\Http\Requests\Size\UpdateRequest as SizeUpdateRequest;

use App\Models\Size\Size;

class SizeController extends Controller
{
    public function index()
    {
        $sizes = Size::paginate(20);
        $requestAttributes = SizeUpdateRequest::requestAttributes();
        
        return view('admin.pages.sizes.index', compact(
            'sizes',
            'requestAttributes'
        ));
    }

    public function new()
    {
        $requestAttributes = SizeStoreRequest::requestAttributes();

        return view('admin.pages.sizez.new', compact(
            'requestAttributes'
        ));
    }
    
    public function store(
        SizeStoreRequest $request
    )
    {
        $attributes = $request::requestAttributes();

        $newSize = Size::create([
            'label' => $request->{$attributes['label']},
            'number' => $request->{$attributes['number']}
        ]);

        $message = __('message.savedData', [
            'label' => __('Size')
        ]);

        if ($request->expectsJson())
        {
            return response([
                'message' => $message
            ]);
        }

        return back()->with('message', $message);
    }

    public function update(
        SizeUpdateRequest $request,
        Size $size
    )
    {
        $attributes = $request::requestAttributes();

        $result = $size->update([
            'label' => $request->{$attributes['label']},
            'number' => $request->{$attributes['number']}
        ]);

        $message = [
            'success' => __("message.updatedData", [
                'label' => __("Size")
            ]),
            'error' => __("message.error")
        ];

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

    public function remove(
        Request $request,
        Size $size
    )
    {
        $message = [
            'success' => __("message.updatedData", [
                'label' => __("Size")
            ]),
            'error' => __("message.error")
        ];

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
