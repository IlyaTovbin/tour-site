<?php

namespace App\Http\Controllers\content;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\content\Schedule;
use App\Http\Requests\ScheduleRequest;

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
}
