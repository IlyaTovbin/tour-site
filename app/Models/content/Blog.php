<?php

namespace App\Models\content;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use DB, FileManager, Session;

class Blog extends Model
{

    static public function getPosts($request = false){
        $posts = DB::table('blogs as b')
        ->join('categories as c', 'c.id', 'b.categorie_id')
        ->select('b.id', 'b.title', 'b.categorie_id', 'b.active', 'b.created_at', 'b.updated_at', 'c.name as category');

        if(isset($request['filterBy']) && is_numeric($request['filterBy'])){
            $posts = $posts->where('b.categorie_id', '=', $request['filterBy']);
        }

        if(isset($request['filterByCreated']) && in_array($request['filterByCreated'], ['DESC', 'ASC'])){
            $posts = $posts->orderBy('b.updated_at', $request['filterByCreated']);
        }else{
            $posts = $posts->orderBy('b.updated_at', 'DESC');
        }

        if(isset($request['active']) && in_array($request['active'], ['0', '1'])){
            $active = $request['active'] == '1' ? 1 : 0 ;
            $posts = $posts->where('b.active', '=', $active);
        }

        if(isset($request['search'])){
            $search = $request['search'];
            $posts = $posts->where('b.title', 'LIKE', "%$search%");
        }

        return $posts->simplePaginate(12);
    }

    static public function store($request){
        $data_content = $request['summernote'];
        $file_name = FileManager::moveFile($request['image'], 'images\\blogs\\');
        if(Session::has('files')){
            $data_content = FileManager::addContentImages('images\\blogs\\content_images\\', $data_content);
        }
        $images_content = FileManager::margeContentImages($data_content);
        if($file_name){
            $blog = new self();
            $blog->categorie_id = $request['category'];
            $blog->title = $request['title'];
            $blog->body = serialize($data_content);
            $blog->image = $file_name;
            $blog->content_images = $images_content ? serialize($images_content) : null;
            $blog->save();
            return true;
        }
        return false;

    }

    static public function deleteBlog($id){
        if(is_numeric($id)){
            $query = DB::table('blogs')->where('id', $id)->select('image', 'content_images')->first();
            if($query){
                FileManager::deleteFile(public_path('images\\blogs\\') . $query->image);
                if($query->content_images){
                    $images = unserialize($query->content_images);
                    foreach($images as $image){
                        FileManager::deleteFile(public_path('images\\blogs\\content_images\\') . $image);
                    }
                }
                $query = DB::table('blogs')->where('id', $id)->delete();
            }
        }
    }

    static public function getPost($id){
        if(is_numeric($id)){
            $post = DB::table('blogs as b')
            ->join('categories as c', 'c.id', 'b.categorie_id')
            ->where('b.id', '=', $id)
            ->select('b.*', 'c.name as category')
            ->first();
            if(empty($post)) return false;
            $post->body = unserialize($post->body);
            return $post;
        }
        return false;

    }

    static public function updatePost($request,int $id){

        $data_content = $request['summernote'];
        if($request['image']){
            $path = 'images\\blogs\\';
            $image = FileManager::moveFile($request['image'], $path);
            FileManager::deleteFile(public_path($path) . $request['check']);
        }else{
            $image = $request['check'];
        }
        
        $images_content = DB::table('blogs')->where('id', $id)->select('content_images')->first();
        $images_content = $images_content->content_images ? unserialize($images_content->content_images) : [];

        if(Session::has('files')){
            $data_content = FileManager::addContentImages('images\\blogs\\content_images\\', $data_content);
        }

        $images_content = FileManager::margeContentImages($data_content, $images_content);
        DB::table('blogs')
        ->where('id', '=', $id)
        ->update([
            'title' => $request['title'],
            'categorie_id' => $request['category'],
            'body' => serialize($data_content),
            'image' => $image,
            'content_images' => $images_content ? serialize($images_content) : null, 
            'updated_at' => Carbon::now()
        ]);
        return TRUE;
    }

    static public function activePost($request){

        if(!is_numeric($request['id']) || !in_array($request['value'], ['true', 'false'])) return false;
        $value = ($request['value'] == 'true') ? 1 : 0;
        DB::table('blogs')
        ->where('id', '=', $request['id'])
        ->update([
            'active' => $value,
        ]);
        return TRUE;
    }

    static public function imageUpload($file){
        $file_name = FileManager::moveFile($file, 'images\\blogs\\content_images\\');
        FileManager::imageUploadToSM($file_name);
        echo $file_name;
    }

    static public function removeFileFrom($file_name){
        FileManager::removeFileFromSM($file_name);
        FileManager::deleteFile(public_path('images\\blogs\\content_images\\') . $file_name);
    }

}
