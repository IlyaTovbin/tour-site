<?php

namespace App\Models\content;

use Illuminate\Database\Eloquent\Model;
use DB;

class Blog extends Model
{
    static public function store($request){

            $blog = new self();
            $blog->categorie_id = $request['category'];
            $blog->title = $request['title'];
            $blog->body = serialize($request['summernote']);
            $blog->save();

    }

}
