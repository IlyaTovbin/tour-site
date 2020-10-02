<?php

namespace App\Models\content;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use DB;

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
            $blog = new self();
            $blog->categorie_id = $request['category'];
            $blog->title = $request['title'];
            $blog->body = serialize($request['summernote']);
            $blog->save();
            return TRUE;
    }

    static public function deleteBlog($id){
        if(is_numeric($id)){
            $query = DB::table('blogs')->where('id', $id);
            if($query->first()){
                $query->delete();
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
            $post->body = unserialize($post->body);
            return $post;
        }
    }

    static public function updatePost($request,int $id){
        DB::table('blogs')
        ->where('id', '=', $id)
        ->update([
            'title' => $request['title'],
            'categorie_id' => $request['category'],
            'body' => serialize($request['summernote']),
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

}
