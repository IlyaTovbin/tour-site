<?php

namespace App\Models\content;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;
use Carbon\Carbon;
use DB, FileManager, Session;

class Tour extends Model
{
    static public function store($request){
        $data_content = $request['summernote'];

        if($request['file']){
            $file_names = [];
            foreach($request['file'] as $file){
                $file_names[] = FileManager::moveFile($file, 'images\\tours\\');
            }
        }
        if(Session::has('files')){
            $data_content = FileManager::addContentImages('images\\tours\\content_images\\', $data_content);
        }
        $images_content = FileManager::margeContentImages($data_content);

        $tour = new self();
        $tour->title = $request['title'];
        $tour->body = serialize($data_content);
        $tour->images = isset($file_names) ? serialize($file_names) : null;
        $tour->content_images = $images_content ? serialize($images_content) : null;
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
            $query = DB::table('tours')->where('id', $id)->select('images', 'content_images')->first();
            if($query){
                $gallery = unserialize($query->images);
                foreach($gallery as $image){
                    unlink(public_path('images\\tours\\') . $image);
                }
                if($query->content_images){
                    $images = unserialize($query->content_images);
                    foreach($images as $image){
                        unlink(public_path('images\\tours\\content_images\\') . $image);
                    }
                }

                $query = DB::table('tours')->where('id', $id)->delete();
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
            $tour->images = $tour->images ? unserialize($tour->images) : null;
            $tour->google_maps = unserialize($tour->google_maps);
            return $tour;
        }
    }

    static public function updateTour($request, $id){
        $data_content = $request['summernote'];

        $images_content = DB::table('tours')->where('id', $id)->select('content_images')->first();
        $images_content = $images_content->content_images ? unserialize($images_content->content_images) : [];

        if(Session::has('files')){
            $data_content = FileManager::addContentImages('images\\tours\\content_images\\', $data_content);
        }

        $images_content = FileManager::margeContentImages($data_content, $images_content);
        DB::table('tours')
        ->where('id', '=', $id)
        ->update([
            'title' => $request['title'],
            'body' => serialize($data_content),
            'images' => null,
            'content_images' => $images_content ? serialize($images_content) : null, 
            'google_maps' =>  $request['google_maps'] ? serialize($request['google_maps']) : null,
            'updated_at' => Carbon::now()
        ]);
        return TRUE;
    }

    static public function imageUpload($file){
        $file_name = FileManager::moveFile($file, 'images\\tours\\content_images\\');
        FileManager::imageUploadToSM($file_name);
        echo $file_name;
    }

    static public function removeFileFrom($file_name){
        FileManager::removeFileFromSM($file_name);
        unlink(public_path('images\\tours\\content_images\\') . $file_name);
    }
}
