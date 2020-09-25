<?php

namespace App\Models\content;

use Illuminate\Database\Eloquent\Model;
use DB;

class Category extends Model
{
    static public function saveCategory($name){
        if(!empty($name) && strlen($name) > 2){
            $product = new self();
            $product->name = $name;
            $product->save();
            return $name;
        }else{
            return false;
        }
    }

    static public function deleteCategory($id){
        
        if(is_numeric($id)){
            $query = DB::table('categories')->where('id', $id);
            if($query->first()){
                $query->delete();
            }
        }
        
    }

    static public function editCategory($id, $name){
        if(!is_numeric($id) || strlen($name) < 2 ) return FALSE;
        DB::table('categories')
            ->where('id', $id)
            ->update(['name' => $name]);
    }

    static public function getCategories(){
        return DB::table('categories')->select('id', 'name')->get();
    }
}
