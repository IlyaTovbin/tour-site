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
        ->select('sc.*', 's.title', 's.from_date', 'to_date')
        ->paginate(9);

        return $info;
    }
}
