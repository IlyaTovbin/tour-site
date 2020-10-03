<?php

namespace App\Models\content;

use Illuminate\Database\Eloquent\Model;
use DB;

class Category extends Model
{
    static public function saveCategory($request){

        $name = $request['image']->getClientOriginalName();
        $path = public_path('images\\category');
        $file_name = pathinfo($name, PATHINFO_FILENAME) . date("-Y-m-d-H-i-s.")  . pathinfo($name, PATHINFO_EXTENSION);
        $result = $request['image']->move($path, $file_name);

        $product = new self();
        $product->name = $request['title'];
        $product->image = $file_name;
        $product->save();
        return true;
    }

    static public function deleteCategory($id){
        
        if(is_numeric($id)){
            $query = DB::table('categories')->where('id', $id);
            if($query->first()){
                $query->delete();
            }
        }
        
    }

    static public function getCategory($id){
        if(is_numeric($id)){
            return DB::table('categories')->where('id', $id)->first();
        }
    }

    static public function editCategory($id, $name){
        if(!is_numeric($id) || strlen($name) < 2 ) return FALSE;
        DB::table('categories')
            ->where('id', $id)
            ->update(['name' => $name]);
    }

    static public function getCategories($data = false){
        if(!$data) return DB::table('categories')->select('id', 'name', 'created_at', 'updated_at')->simplePaginate(12);
        $ids = $data->pluck('categorie_id')->toArray();
        return DB::table('categories')
        ->whereIn('id', $ids)
        ->select('id', 'name')
        ->get();
    }
}
