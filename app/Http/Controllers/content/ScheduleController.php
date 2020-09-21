<?php

namespace App\Http\Controllers\content;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index(){
        $view_data['title'] = 'Schedule';
        $view_data['schedule'] = 'active';
        return view('content/schedule/schedule_index', $view_data);
    }
}
