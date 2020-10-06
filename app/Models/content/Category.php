<?php

namespace App\Models\content;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use DB, FileManager;

class Category extends Model
{

    static public function getCategories($data = false, $request = false){
        if(!$data){
            $categories =  DB::table('categories')
            ->select('id', 'name', 'created_at', 'updated_at');
    
            if(isset($request['filterByCreated']) && in_array($request['filterByCreated'], ['DESC', 'ASC'])){
                $categories = $categories->orderBy('updated_at', $request['filterByCreated']);
            }else{
                $categories = $categories->orderBy('updated_at', 'DESC');
            }
    
            if(isset($request['search'])){
                $search = $request['search'];
                $categories = $categories->where('name', 'LIKE', "%$search%");
            }

            return $categories->simplePaginate(6);
        } 

        $ids = $data->pluck('categorie_id')->toArray();
        return DB::table('categories')
        ->whereIn('id', $ids)
        ->select('id', 'name')
        ->get();
    }

    static public function saveCategory($request){
        $file_name = FileManager::moveFile($request['image'], 'images\\category\\');
        if($file_name){
            $product = new self();
            $product->name = $request['title'];
            $product->image = $file_name;
            $product->save();
            return true;
        }
        return false;

    }

    static public function deleteCategory($id){
        if(is_numeric($id)){
            $query = DB::table('categories')->where('id', $id)->select('image')->first();
            if($query){
                unlink(public_path('images\\category\\') . $query->image);
                $query = DB::table('categories')->where('id', $id)->delete();
            }
        }
    }

    static public function updateCategory($request, int $id){

        if($request['image']){
            $path = 'images\\category\\';
            $image = FileManager::moveFile($request['image'], $path);
            unlink(public_path($path) . $request['check']);
        }else{
            $image = $request['check'];
        }

        DB::table('categories')
        ->where('id', '=', $id)
        ->update([
            'name' => $request['title'],
            'image' => $image,
            'updated_at' => Carbon::now()
        ]);
        return TRUE;
    }

    static public function getCategory($id){
        if(is_numeric($id))
            return DB::table('categories')->where('id', $id)->first() ? DB::table('categories')->where('id', $id)->first() : false;
    }

    static public function editCategory($id, $name){
        if(!is_numeric($id) || strlen($name) < 2 ) return FALSE;
        DB::table('categories')
            ->where('id', $id)
            ->update(['name' => $name]);
    }


}
