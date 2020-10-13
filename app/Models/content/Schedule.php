<?php

namespace App\Models\content;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use DB, FileManager, Session;

class Schedule extends Model
{
    static public function getSchedules($request = false){
        $tours = DB::table('schedules as s')
        ->select('s.id', 's.title', 's.from_date', 's.to_date', 's.price', 's.active', 's.updated_at', 's.created_at');

        if(isset($request['filterByCreated']) && in_array($request['filterByCreated'], ['DESC', 'ASC'])){
            $tours = $tours->orderBy('s.updated_at', $request['filterByCreated']);
        }else{
            $tours = $tours->orderBy('s.updated_at', 'DESC');
        }

        if(isset($request['active']) && in_array($request['active'], ['0', '1'])){
            $active = $request['active'] == '1' ? 1 : 0 ;
            $tours = $tours->where('s.active', '=', $active);
        }

        if(isset($request['search'])){
            $search = $request['search'];
            $tours = $tours->where('s.title', 'LIKE', "%$search%");
        }

        return $tours->simplePaginate(12);
    }
    
    static public function store($request){
        $data_content = $request['summernote'];

        if($request['file']){
            $file_names = [];
            foreach($request['file'] as $file){
                $file_names[] = FileManager::moveFile($file, 'images\\schedule\\');
            }
        }

        if(Session::has('files')){
            $data_content = FileManager::addContentImages('images\\schedule\\content_images\\', $data_content);
        }
        $images_content = FileManager::margeContentImages($data_content);

        $schedule = new self();
        $schedule->title = $request['title'];
        $schedule->from_date = $request['from_date'];
        $schedule->to_date = $request['to_date'];
        $schedule->price = $request['price'];
        $schedule->content = serialize($data_content);
        $schedule->notes = $request['notes'] ? $request['notes'] : null;
        $schedule->content_images = $images_content ? serialize($images_content) : null;
        $schedule->gallery = isset($file_names) ? serialize($file_names) : null;
        $schedule->google_maps = $request['google_maps'] ? serialize($request['google_maps']) : null;
        $schedule->save();
        return TRUE;
    }

    static public function activeSchedule($request){

        if(!is_numeric($request['id']) || !in_array($request['value'], ['true', 'false'])) return false;
        $value = ($request['value'] == 'true') ? 1 : 0;
        DB::table('schedules')
        ->where('id', '=', $request['id'])
        ->update([
            'active' => $value,
        ]);
        return TRUE;
    }

    static public function deleteSchedule($id){
        if(is_numeric($id)){
            $query = DB::table('schedules')->where('id', $id)->select('gallery', 'content_images')->first();
            if($query){
                if($query->gallery){
                    $gallery = unserialize($query->gallery);
                    foreach($gallery as $image){
                        FileManager::deleteFile(public_path('images\\schedule\\') . $image);
                    }
                }
                if($query->content_images){
                    $images = unserialize($query->content_images);
                    foreach($images as $image){
                        FileManager::deleteFile(public_path('images\\schedule\\content_images\\') . $image);
                    }
                }

                $query = DB::table('schedules')->where('id', $id)->delete();
            }
        }
    }

    static public function getSchedule($id){
        if(is_numeric($id)){
            $schedule = DB::table('schedules as s')
            ->where('s.id', '=', $id)
            ->select('s.*')
            ->first();
            if(empty($schedule)) return false;
            $schedule->content = unserialize($schedule->content);
            $schedule->gallery = $schedule->gallery ? unserialize($schedule->gallery) : null;
            $schedule->google_maps = unserialize($schedule->google_maps);
            return $schedule;
        }
        return false;
    }

    static public function updateSchedule($request,int $id){
        $data_content = $request['summernote'];

        if($request['file']){
            $file_names = [];
            foreach($request['file'] as $file){
                $file_names[] = FileManager::moveFile($file, 'images\\schedule\\');
            }
        }

        $images_gallery = DB::table('schedules')->where('id', '=', $id)->select('gallery')->first();
        if($request['file']){
            $images_gallery = array_merge(unserialize($images_gallery->gallery) ? unserialize($images_gallery->gallery) : [], $file_names);
        }else{
            $images_gallery = unserialize($images_gallery->gallery);
        }

        $images_content = DB::table('schedules')->where('id', $id)->select('content_images')->first();
        $images_content = $images_content->content_images ? unserialize($images_content->content_images) : [];

        if(Session::has('files')){
            $data_content = FileManager::addContentImages('images\\schedule\\content_images\\', $data_content);
        }

        $images_content = FileManager::margeContentImages($data_content, $images_content);
        DB::table('schedules')
        ->where('id', '=', $id)
        ->update([
            'title' => $request['title'],
            'from_date' => $request['from_date'],
            'to_date' => $request['to_date'],
            'price' => $request['price'],
            'content' => serialize($data_content),
            'notes' => $request['notes'] ? $request['notes'] : null,
            'content_images' => $images_content ? serialize($images_content) : null, 
            'gallery' => serialize($images_gallery),
            'google_maps' =>  $request['google_maps'] ? serialize($request['google_maps']) : null,
            'updated_at' => Carbon::now()
        ]);
        return TRUE;

    }

    static public function deleteImage($request){
        if(!is_numeric($request['id'])) return false;
        $images = DB::table('schedules')->where('id', '=', $request['id'])->select('gallery')->first();
        if(!$images) return false;
        $images = unserialize($images->gallery);
        $key = array_search($request['image'], $images);
        FileManager::deleteFile(public_path('images\\schedule\\') . $request['image']);
        unset($images[$key]);
        DB::table('schedules')
        ->where('id', '=', $request['id'])
        ->update([
            'gallery' => !empty($images) ? serialize($images) : null,
            'updated_at' => Carbon::now()
        ]);
        echo $request['image'];
    }

    static public function getToursIdName(){
        return DB::table('tours')->select('id', 'title')->get();
    }

    static public function imageUpload($file){
        $file_name = FileManager::moveFile($file, 'images\\schedule\\content_images\\');
        FileManager::imageUploadToSM($file_name);
        echo $file_name;
    }

    static public function removeFileFrom($file_name){
        FileManager::removeFileFromSM($file_name);
        FileManager::deleteFile(public_path('images\\schedule\\content_images\\') . $file_name);
    }


}
