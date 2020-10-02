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
        if($request['file']){
            $file_names = [];
            foreach($request['file'] as $file){
                $name = $file->getClientOriginalName();
                $path = public_path('images\\tours');
                $file_name = pathinfo($name, PATHINFO_FILENAME) . date("-Y-m-d-H-i-s.")  . pathinfo($name, PATHINFO_EXTENSION);
                $result = $file->move($path, $file_name);
                $file_names[] = $file_name;
            }
        }

        $tour = new self();
        $tour->title = $request['title'];
        $tour->body = serialize($request['summernote']);
        $tour->images = isset($file_names) ? serialize($file_names) : null;
        $tour->google_maps = $request['google_maps'] ? serialize($request['google_maps']) : null;
        $tour->save();
        return TRUE;
    }

    static public function getTours($request = false){
        $tours = DB::table('tours as t')
        ->select('t.id', 't.title', 't.active', 't.updated_at', 't.created_at');

        if(isset($request['filterByCreated']) && in_array($request['filterByCreated'], ['DESC', 'ASC'])){
            $tours = $tours->orderBy('t.updated_at', $request['filterByCreated']);
        }else{
            $tours = $tours->orderBy('t.updated_at', 'DESC');
        }

        if(isset($request['active']) && in_array($request['active'], ['0', '1'])){
            $active = $request['active'] == '1' ? 1 : 0 ;
            $tours = $tours->where('t.active', '=', $active);
        }

        if(isset($request['search'])){
            $search = $request['search'];
            $tours = $tours->where('t.title', 'LIKE', "%$search%");
        }

        return $tours->simplePaginate(12);
    }

    static public function activeTour($request){

        if(!is_numeric($request['id']) || !in_array($request['value'], ['true', 'false'])) return false;
        $value = ($request['value'] == 'true') ? 1 : 0;
        DB::table('tours')
        ->where('id', '=', $request['id'])
        ->update([
            'active' => $value,
        ]);
        return TRUE;
    }

    static public function deleteTour($id){
        if(is_numeric($id)){
            $query = DB::table('tours')->where('id', $id);
            if($query->first()){
                $query->delete();
            }
        }
    }

    static public function getTour($id){
        if(is_numeric($id)){
            $tour = DB::table('tours as t')
            ->where('t.id', '=', $id)
            ->select('t.*')
            ->first();
            $tour->body = unserialize($tour->body);
            $tour->images = unserialize($tour->images);
            $tour->google_maps = unserialize($tour->google_maps);
            return $tour;
        }
    }
}
