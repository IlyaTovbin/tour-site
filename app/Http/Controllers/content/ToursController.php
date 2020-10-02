<?php

namespace App\Http\Controllers\content;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\content\Tour;
use App\Http\Requests\TourRequest;

class ToursController extends Controller
{
    public $view_data = [
        'title' => 'Tours',
        'tours' => 'active'
    ];

    public function index(){
        return view('content/tours/tours_index', $this->view_data);
    }

    public function create(){
        $this->view_data['title'] .= ' Create';
        return view('content/tours/tours_create', $this->view_data);
    }

    public function store(TourRequest $request){
        if(Tour::store($request)){
            return redirect('/tours');
        }
    }
}
