<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $files = File::latest()->paginate(10);
        return view('files.file', compact('files'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('files.uploud');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:docx,pdf|max:2048'
        ]);

        $file = $request->file('file');
        $fileName = $file->hashName();
        $file->storeAs('uploads', $fileName);

        File::create([
            'original_name' => $file->getClientOriginalName(),
            'generated_name' => $fileName
        ]);

        return redirect()
            ->route('files.index')
            ->with('success', 'File berhasil diupload');
    
    }

    public function download(File $file)
    {
        $filePath = storage_path("app/uploads/{$file->generated_name}");

        if (file_exists($filePath)) {
            return response()->download($filePath, $file->original_name);
        } else {
            abort(404, 'File not found');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(File $file)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(File $file)
    {
        return view('files.edit',['file' => $file]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, File $file)
    {
        $request->validate([
            'file' => 'required|mimes:docx,pdf|max:2048'
        ]);

        $f = $request->file('file');
        $fileName = $f->hashName();
        $f->storeAs('uploads', $fileName);

        $file->original_name = $f->getClientOriginalName();
        $file->generated_name = $fileName;
        $file->save();
    

        return redirect()
            ->route('files.index')
            ->with('success', 'File berhasil diupload');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(File $file)
    {
       
        // Hapus entri dari database
        $file->delete();
    
        //return redirect('/files') ->with('success', 'File berhasil diHapus');
       // File::where('files', $file)->delete();
        return redirect()->to('files')->with('success', 'berhasil hapus');
//return 'hi'.$file;
    }
}
