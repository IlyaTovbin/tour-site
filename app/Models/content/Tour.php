<?php

namespace App\Models\content;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;
use Carbon\Carbon;
use DB;

class Tour extends Model
{
    static public function store($request){
        $file_names = [];
        foreach($request['file'] as $file){
            $name = $file->getClientOriginalName();
            $path = public_path('images\\tours');
            $file_name = pathinfo($name, PATHINFO_FILENAME) . date("-Y-m-d-H-i-s.")  . pathinfo($name, PATHINFO_EXTENSION);
            $result = $file->move($path, $file_name);
            $file_names[] = $file_name;
        }
        
        $tour = new self();
        $tour->title = $request['title'];
        $tour->body = serialize($request['summernote']);
        $tour->images = serialize($file_names);
        $tour->google_maps = serialize($request['google_maps']);
        $tour->save();
        return TRUE;
        
    }
}
