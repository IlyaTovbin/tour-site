<?php

namespace App\Http\Controllers\content;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\content\Schedule;
use App\Http\Requests\ScheduleRequest;
use App\Models\content\Tour;
use Session, FileManager;

class ScheduleController extends Controller
{

    public $view_data = [
        'title' => 'Schedule',
        'schedule_nav' => 'active'
    ];

    public function index(Request $request){
        $this->view_data['schedules'] = Schedule::getSchedules($request);
        return view('content/schedule/schedule_index', $this->view_data);
    }

    public function create(){
        Session::forget('files');
        FileManager::cleanUselessFiles(public_path('images\\schedule\\content_images\\'));
        $this->view_data['title'] .= ' Create';
        return view('content/schedule/schedule_create', $this->view_data);
    }

    public function store(ScheduleRequest $request){
        if(Schedule::store($request)){
            return redirect('/schedule');
        }
    }

    public function edit(Request $request, $id){
        Session::forget('files');
        $this->view_data['schedule'] = Schedule::getSchedule($id);
        FileManager::setFilesSession($this->view_data['schedule']->content_images);
        $this->view_data['title'] .= ' Edit';
        return view('content/schedule/schedule_edit', $this->view_data);
    }

    public function update(ScheduleRequest $request, $id){
        if(Schedule::updateSchedule($request, $id)){
            return redirect('/schedule');
        }
    }

    public function ajaxRequest(Request $request){

        if(in_array( $request['method'], ['activeSchedule', 'deleteSchedule', 'imageUpload', 'removeFileFrom', 'deleteImage'])){
            $method = $request['method'];
            $this->$method($request);
        }else{
            return 'Error';
        }
    }

    public function deleteImage($request){
        Schedule::deleteImage($request);
    }

    public function removeFileFrom($request){
        Schedule::removeFileFrom($request['fileName']);
    }

    public function imageUpload($request){
        Schedule::imageUpload($request['file']);
    }

    public function deleteSchedule(Request $request){
        Schedule::deleteSchedule($request['id']);
    }

    public function activeSchedule(Request $request){
        Schedule::activeSchedule($request);
    }

    public function show(Request $request, $id){
        $this->view_data['schedule'] = Schedule::getSchedule($id);
        if($this->view_data['schedule']){
            $this->view_data['title'] = ' Schedule';
            return view('content/schedule/schedule_view', $this->view_data);
        }
        return abort(404);
    }

}
