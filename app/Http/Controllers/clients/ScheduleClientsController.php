<?php

namespace App\Http\Controllers\clients;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\clients\ScheduleClient;
use App\Models\content\Schedule;

class ScheduleClientsController extends Controller
{
    public static $view_data = [
        'title' => 'Schedule clients',
        'schedule_info' => 'active'
    ];

    static public function index(Request $request){
        self::$view_data['info'] = ScheduleClient::getInfo($request);
        self::$view_data['schedules'] = Schedule::getNamesSchedules();
        return view('clients/schedule_clients/schedule_clients_index', self::$view_data);
    }
}
