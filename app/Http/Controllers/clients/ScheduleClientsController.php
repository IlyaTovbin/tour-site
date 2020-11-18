<?php

namespace App\Http\Controllers\clients;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\clients\ScheduleClient;
use App\Models\content\Schedule;
use App\Http\Requests\ScheduleClientsRequest;

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

    public function ajaxRequest(Request $request){
        if(in_array( $request['method'], ['deleteClient'])){
            $method = $request['method'];
            $this->$method($request);
        }else{
            return 'Error';
        }
    }

    public function deleteClient($request){
        ScheduleClient::deleteClient($request['id']);
    }

    public function edit(Request $request,int $id){
        self::$view_data['title'] .= ' Edit';
        self::$view_data['info'] = ScheduleClient::getScheduleClient($id);
        self::$view_data['schedules'] = Schedule::getNamesSchedules();
        return view('clients/schedule_clients/schedule_clients_edit', self::$view_data);
    }

    public function update(ScheduleClientsRequest $request, $id){
        if(ScheduleClient::updateScheduleClient($request, $id)){
            return redirect('/schedule-clients');
        }
    }

}
