<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image as InterventionImage;

class ImageController extends Controller
{
    public function index()
    {
        $images = [];
        $r = Image::all();

        foreach ($r as $image) {
            $images[] = [
                'src' => $image->path,
                'thumbnail' => $image->thumb,
                'w' => 300,
                'h' => 200,
                'title' => $image->title,
                'alt' => $image->name,
            ];
        }

//        return $images;

        return view('images.index', [
            'images' => Image::paginate(10),
            'new' => $images,
        ]);
    }

    public function create()
    {
        return view('images.create');
    }

    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'title' => 'required',
            'path' => 'required|image',
        ]);

        $fileName = $request->file('path')->getClientOriginalName();
        $data['path'] = $request->file('path')->storeAs('images/full', $fileName, 'public');
        $data['name'] = $request->file('path')->getClientOriginalName();

        $img = InterventionImage::make($request->file('path')->getRealPath())->resize(64, 64);
        $img->save(storage_path('app/public/images/thumbs/') . $fileName);

        $data['thumb'] = 'images/thumbs/' . $fileName;

        Image::create($data);

        $request->session()->flash('status', 'Image successfully uploaded.');

        return redirect()->route('images.index');
    }
}
