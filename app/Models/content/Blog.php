<?php

namespace App\Models\content;

use Illuminate\Database\Eloquent\Model;
use DB;

class Blog extends Model
{

    static public function getPosts(){
        $posts = DB::table('blogs as b')
        ->join('categories as c', 'c.id', 'b.categorie_id')
        ->select('b.*', 'c.name as category')
        ->get();
        return $posts;
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

}
