<?php

namespace App\Models\clients;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use DB;

class ContactClient extends Model
{
    static public function getInfo($request){
        $info = DB::table('contacts')
        ->select('*');

        if(isset($request['filterBy']) && is_numeric($request['filterBy'])){
            $info = $info->where('type', '=', $request['filterBy']);
        }

        if(isset($request['filterByCreated']) && in_array($request['filterByCreated'], ['DESC', 'ASC'])){
            $info = $info->orderBy('updated_at', $request['filterByCreated']);
        }else{
            $info = $info->orderBy('updated_at', 'DESC');
        }

        if(isset($request['search'])){
            $search = $request['search'];
            $info = $info->where('name', 'LIKE', "%$search%");
        }

        return $info->simplePaginate(20);
    }

    static public function deleteContact($id){
        if(is_numeric($id)){
            $query = DB::table('contacts')->where('id', $id)->delete();
        }
    }
}
