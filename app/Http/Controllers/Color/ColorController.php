<?php

namespace App\Http\Controllers\Color;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\Color\StoreRequest as ColorStoreRequest;
use App\Http\Requests\Color\UpdateRequest as ColorUpdateRequest;

use App\Models\Color\Color;

class ColorController extends Controller
{
    public function index()
    {
        $colors = Color::paginate(20);
        $requestAttributes = ColorUpdateRequest::requestAttributes();

        return view('admin.pages.colors.index', compact(
            'colors',
            'requestAttributes'
        ));
    }

    public function update(
        ColorUpdateRequest $request,
        Color $color
    )
    {
        $attributes = $request::requestAttributes();

        $result = $color->update([
            'hex' => $request->{$attributes['hex']},
            'az' => ['name' => $request->{$attributes['azColor']}],
            'ru' => ['name' => $request->{$attributes['ruColor']}],
            'en' => ['name' => $request->{$attributes['enColor']}],
        ]);

        $message = [
            'success' => __('message.updatedData', [
                'label' => __('Color')
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

            return response([
                'message' => $message['error']
            ], 500);
        }

        if ($result)
            return back()->with('message', $message['success']);

        return back()->withErrors('message', $message['error']);
    }

    public function remove(
        Request $request,
        Color $color
    )
    {
        $result = $color->delete();

        $message = [
            'success' => __('message.deletedData', [
                'label' => __('Color')
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

            return response([
                'message' => $message['error']
            ], 500);
        }

        if ($result)
            return back()->with('message', $message['success']);

        return back()->withErrors('message', $message['error']);
    }

    public function new()
    {
        $requestAttributes = ColorStoreRequest::requestAttributes();
        return view('admin.pages.colors.new', compact(
            'requestAttributes'
        ));
    }

    public function store(
        ColorStoreRequest $request
    )
    {
        $attributes = $request::requestAttributes();

        $newColor = Color::create([
            'hex' => $request->{$attributes['hex']},
            'az' => ['name' => $request->{$attributes['azColor']}],
            'ru' => ['name' => $request->{$attributes['ruColor']}],
            'en' => ['name' => $request->{$attributes['enColor']}]
        ]);

        $message = __('message.savedData', [
            'label' => __('Color')
        ]);

        if ($request->expectsJson())
        {
            return response([
                'message' => $message
            ]);
        }

        return back()->with('message', $message);
    }
}