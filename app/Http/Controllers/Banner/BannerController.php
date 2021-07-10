<?php

namespace App\Http\Controllers\Banner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

use App\Models\Banner\Banner;

class BannerController extends Controller
{
    public function __construct()
    {
        $this->path = '/banners';
        $this->diskName = 'uploads';
    }
    
    public function index(Request $request)
    {
        $banners = Banner::paginate(9)->toArray();

        return view('admin.pages.banners.index', compact(
            'banners'
        ));
    }

    public function store(Request $request)
    {
        $request->validate([
            'banner' => 'required|file|mimes:jpg,png,gif',
            'link'   => 'required|string'
        ]);

        $image = $request->file('banner');
        $imagePathOnDisk = $image->store($this->path, $this->diskName); 

        Banner::create([
            'link' => $request->link,
            'disk' => $this->diskName,
            'source' => config("filesystems.disks.$this->diskName.path") . "/$imagePathOnDisk",
            'path' => "$imagePathOnDisk",
            'name' => basename($imagePathOnDisk)
        ]);

        return response(basename($imagePathOnDisk));
    }

    public function remove(Request $request)
    {
        $request->validate([
            'bannerID' => 'required|exists:banners,id'
        ]);

        $banner = Banner::find($request->bannerID);

        if ($banner)
        {
            if (Storage::disk($this->diskName)->exists("$banner->path"))
            {
                Storage::disk($this->diskName)->delete("$banner->path");
            }

            $banner->delete();
        }

        return response([
            'message' => 'image deleted',
            'result' => true
        ]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'bannerID' => 'required|exists:banners,id',
            'link' => 'required|string|max:255'
        ]);

        Banner::where('id', $request->bannerID)->update([
            'link' => $request->link
        ]);

        return response([
            'message' => 'link updated',
            'result' => true,
        ]);
    }

    public function new()
    {
        return view('admin.pages.banners.new');
    }
}
