<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function index()
    {
        return view('files.index', [
            'files' => File::paginate(10),
        ]);
    }

    public function create()
    {
        return view('files.create');
    }

    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'title' => 'required',
            'pdf' => 'required|file',
        ]);

        $data['name'] = $request->file('pdf')->getClientOriginalName();
        $data['path'] = $data['pdf']->store('pdfs/', 'public');
        unset($data['pdf']);

        $request->session()->flash('status', 'PDF successfully uploaded.');

        File::create($data);

        return redirect()->route('files.index');
    }

    public function download(File $file)
    {
        return Storage::disk('public')
            ->download($file->path, $file->name);
    }
}
