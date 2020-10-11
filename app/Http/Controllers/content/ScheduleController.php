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
        // $this->view_data['posts'] = Blog::getPosts($request);
        // $this->view_data['relevant_categories'] = Category::getCategories(Blog::getPosts());
        return view('content/schedule/schedule_index', $this->view_data);
    }

    public function create(){
        Session::forget('files');
        FileManager::cleanUselessFiles(public_path('images\\schedule\\content_images\\'));
        $this->view_data['title'] .= ' Create';
        $this->view_data['tours'] = Tour::getToursIdName();
        return view('content/schedule/schedule_create', $this->view_data);
    }

}
