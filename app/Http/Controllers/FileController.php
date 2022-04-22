<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\File;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{

    public function index(){

        $files = auth()->user()->files;
        return view('files', compact('files'));
    }

    public function store(Request $request){

        $this->validate($request, [
            'name' => 'required',
            'file' => 'required|mimes:pdf,xml,word,jpg,png'
        ]);

        $request_file = $request->file;
        $new_file_name = $request->name.'.'.$request_file->extension();
        $existing_files = File::where('name', $new_file_name)->where('user_id', auth()->user()->id)->get();

        if(count($existing_files) > 0){
            return back()->withErrors([
                'message' => 'Ya tiene un archivo con ese nombre'
            ]);
        }

        $user_id = auth()->user()->id;
        $request_file->storeAs('user_' .$user_id, $new_file_name);

        $file = new File();
        $file->name = $new_file_name;
        $file->user_id = $user_id;
        $file->save();

        return redirect()->route('files.index');
    }

    public function download($file_name) {
    
        $file = Storage::disk('local')->path('user_'.auth()->user()->id.'/'.$file_name);
        
        if($file == null){
            return back()->withErrors([
                'message' => 'El archivo no existe'
            ]);
        }

        return response()->download($file);
    }
}
