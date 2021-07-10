<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests\ProductImage\StoreRequest;

use Illuminate\Support\Facades\Storage;

use App\Models\Product\ProductImage;

class ProductImageController extends Controller
{
    public function __construct()
    {
        $this->tempDisk = 'product_temp_images';
        $this->disk = 'product_images';
    }

    public function store(
        StoreRequest $request
    )
    {
        $attributes = $request::requestAttributes();

        $image = $request->file($attributes['images']);
        $path  = $image->store('', $this->tempDisk);

        return basename($path);
    }

    public function remove(
        Request $request,
        ProductImage $image
    )
    {
        if (Storage::disk($this->disk)->exists($image->path))
        {
            Storage::disk($this->disk)->delete($image->path);
        }

        $image->delete();

        $message = __('Şəkil silindi');

        if ($request->expectsJson())
        {
            return response([
                'message' => $message
            ]);
        }

        return back()->with('message', $message);
    }
}