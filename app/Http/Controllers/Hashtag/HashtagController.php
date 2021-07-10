<?php

namespace App\Http\Controllers\Hashtag;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Hashtag\Hashtag;

class HashtagController extends Controller
{
    public function index()
    {
        $hashtags = Hashtag::paginate(20)->toArray();

        foreach($hashtags['data'] as $index => $hashtag)
        {
            $availableLocales = array_column($hashtag['translations'], 'locale');
            $newTranslationsArr = array_combine($availableLocales, $hashtag['translations']);

            $hashtags['data'][$index]['translations'] = $newTranslationsArr;
        }

        return view('admin.pages.hashtags.index', compact(
            'hashtags'
        ));
    }

    public function new()
    {
        return view('admin.pages.hashtags.new');
    }

    public function store(Request $request)
    {

        $request->validate([
            'azLabel' => 'required|string|max:255',
            'ruLabel' => 'required|string|max:255',
            'enLabel' => 'required|string|max:255',
            'link'    => 'required|string|max:255'
        ]);

        $hashtag = Hashtag::create([
            'link'  => $request->link
        ]);

        foreach(config('translatable.locales') as $locale)
        {
            $requestKey = $locale . "Label";

            $hashtag->translateOrNew($locale)->label = $request->{$requestKey};
        }

        $hashtag->save();

        return response([
            'message' => 'hashtag created',
            'result' => true
        ]);
    }

    public function remove(Request $request)
    {
        $request->validate([
            'id' => 'exists:hashtags,id'
        ]);

        Hashtag::where('id', $request->id)->delete();

        return response([
            'message' => 'hashtag removed',
            'result' => true
        ]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:hashtags,id',
            'azLabel' => 'required|string|max:255',
            'ruLabel' => 'required|string|max:255',
            'enLabel' => 'required|string|max:255',
            'link' => 'required|string|max:255'
        ]);

        $hashtag = Hashtag::find($request->id);

        $hashtag->update([
            'link' => $request->link
        ]);

        foreach(config('translatable.locales') as $locale)
        {
            $requestKey = $locale . "Label";

            $hashtag->translateOrNew($locale)->label = $request->{$requestKey};
        }

        $hashtag->save();

        return response([
            'message' => 'hashtag updated',
            'result' => true
        ]);
    }
}
