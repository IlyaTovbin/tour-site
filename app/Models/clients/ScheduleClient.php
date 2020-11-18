<?php

namespace App\Models\clients;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use DB;

class ScheduleClient extends Model
{
    static public function getInfo($request){
        $info = DB::table('schedule_clients as sc')
        ->join('schedules as s', 's.id', 'sc.schedule_id')
        ->select('sc.*', 's.title', 's.from_date', 'to_date');

        if(isset($request['filterBy']) && is_numeric($request['filterBy'])){
            $info = $info->where('sc.schedule_id', '=', $request['filterBy']);
        }

        if(isset($request['filterByCreated']) && in_array($request['filterByCreated'], ['DESC', 'ASC'])){
            $info = $info->orderBy('sc.updated_at', $request['filterByCreated']);
        }else{
            $info = $info->orderBy('sc.updated_at', 'DESC');
        }

        if(isset($request['search'])){
            $search = $request['search'];
            $info = $info->where('sc.name', 'LIKE', "%$search%");
        }

        return $info->simplePaginate(20);
    }

    static public function deleteClient($id){
        if(is_numeric($id)){
            $query = DB::table('schedule_clients')->where('id', $id)->select('name')->first();
            if($query){
                $query = DB::table('schedule_clients')->where('id', $id)->delete();
            }
        }
    }

    static public function getScheduleClient($id){
        if(is_numeric($id)){
            return DB::table('schedule_clients')->where('id', $id)->first();
        }
    }

    static public function updateScheduleClient($request,int $id){

        DB::table('schedule_clients')
        ->where('id', '=', $id)
        ->update([
            'schedule_id' => $request['schedule'],
            'name' => $request['name'],
            'phone' => $request['phone'],
            'email' => $request['email'],
            'quantity' => $request['quantity'],
            'transport' => $request['transport'],
            'pay' => $request['pay'],
            'price' => $request['price'],
            'city' => $request['city'],
            'updated_at' => Carbon::now()
        ]);
        return true;
    }
}
