<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests\Product\StoreRequest;
use App\Http\Requests\Product\UpdateRequest;

use Illuminate\Support\Facades\Storage;

use App\Exceptions\ProductImageNotFoundException;

use App\Models\Product\Product;
use App\Models\Category\Category;
use App\Models\Product\ProductImage;

use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate(1);

        return view('admin.pages.products.index', compact(
            'products'
        ));
    }

    public function new()
    {
        $categories = Category::get()->toArray();
        $requestAttributes = StoreRequest::requestAttributes();

        return view('admin.pages.products.new', compact(
            'categories',
            'requestAttributes'
        ));
    }

    public function edit(
        Request $request,
        Product $product
    )
    {
        $categories = Category::get();
        $requestAttributes = UpdateRequest::requestAttributes();

        return view('admin.pages.products.edit', compact(
            'product',
            'categories',
            'requestAttributes'
        ));
    }

    public function store(
        StoreRequest $request,
        ProductImageController $imageController
    )
    {
        $requestAttributes = $request::requestAttributes();

        foreach($request->images as $index => $imageName)
        {
            if (!Storage::disk($imageController->tempDisk)->exists($imageName))
            {
                throw new ProductImageNotFoundException(__("Şəkil mövcud deyil: ", ['image' => $imageName]));
            }
        }

        $product = Product::create([
            'categoryId' => $request->category,
            'price' => $request->price
        ]);

        foreach(config('translatable.locales') as $locale)
        {
            $name = $locale . "Name";
            $desc = $locale . "Desc";
            $slug = Str::slug($request->{$name});

            $product->translateOrNew($locale)->name = $request->{$requestAttributes[$name]};
            $product->translateOrNew($locale)->desc = $request->{$requestAttributes[$desc]};
            $product->translateOrNew($locale)->slug = $slug;
        }

        $product->save();

        if ($request->expectsJson())
        {
            return response([
                'message' => __('Məhsul yaradıldı'),
                'product' => $product
            ]);
        }

        return back()->with('message', __('Məhsul yaradıldı'));
    }

    public function update(
        UpdateRequest $request,
        Product $product,
        ProductImageController $imageController
    )
    {
        $requestAttributes = $request::requestAttributes();
        $requrestValidationMessages = $request->messages();

        $product->price = $request->{$requestAttributes['price']};
        $product->categoryId = $request->{$requestAttributes['category']};

        foreach(config('translatable.locales') as $locale)
        {
            $name = $locale . "Name";
            $desc = $locale . "Desc";
            $slug = Str::slug($request->{$name});

            $product->translateOrNew($locale)->name = $request->{$requestAttributes[$name]};
            $product->translateOrNew($locale)->desc = $request->{$requestAttributes[$desc]};
            $product->translateOrNew($locale)->slug = $slug;
        }

        if (is_array($request->{$requestAttributes['images']}))
        {
            foreach($request->{$requestAttributes['images']} as $index => $imageName)
            {
                if (!Storage::disk($imageController->tempDisk)->exists($imageName))
                {
                    throw new ProductImageNotFoundException(__("Şəkil mövcud deyil: ", ['image' => $imageName]));
                }
            }

            foreach($request->{$requestAttributes['images']} as $index => $imageName)
            {
                $image = Storage::disk($imageController->tempDisk)->get($imageName);
                $newPath = "$product->id/$imageName";

                if (Storage::disk($imageController->disk)->put(
                    $newPath,
                    $image
                ))
                {
                    $imageData = ProductImage::create([
                        'disk' => $imageController->disk,
                        'path' => $newPath,
                        'name' => $imageName,
                        'source' => config("filesystems.disks.{$imageController->disk}.path") . "/$newPath",
                        "productId" => $product->id
                    ]);

                    Storage::disk($imageController->tempDisk)->delete($imageName);
                }
            }
        }

        if ($product->images->count() == 0)
        {
            return response([
                'message' => __('Verilən məlumatlar etibarsız idi.'),
                'errors' => [
                    $requestAttributes['images'] => [
                        $requrestValidationMessages["$requestAttributes[images].min"]
                    ]
                ]
            ], 422);
        }

        $saved = $product->save();
        
        $message = ($saved)
                    ?
                    __('Məhsul yeniləndi')
                    : 
                    __('Xəta baş verdi');

        if ($request->expectsJson())
        {
            if ($saved)
            {
                return response([
                    'message' => $message
                ]);
            }

            return response([
                'message' => $message
            ], 500);
        }

        if ($saved)
        {
            return back()->with('message', $message);
        }

        return back()->withErrors('message', $message);
    }

    public function remove(
        Request $request,
        Product $product
    )
    {
        $product->delete();

        if ($request->expectsJson())
        {
            return response([
                'message' => __('Məhsul silindi')
            ]);
        }

        return back()->with('message', __('Məhsul silindi'));
    }

    public function show(
        Request $request,
        Product $product
    )
    {
        return view('');
    }
}