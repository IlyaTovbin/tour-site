<?php

namespace App\Models\content;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use DB;

class Tour extends Model
{
    static public function store($request){
        $file_names = [];
        foreach($request['file'] as $file){
            $file_name = $file->getClientOriginalName() . date("Y-m-d-H:i:s");
            Storage::move($file->getClientOriginalName() , url('images/tours/' . $file_name));
            $file_names[] = $file_name;
        }
        dd($file_names);
        
    }
}
