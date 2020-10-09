<?php

namespace App\Http\Controllers\content;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\content\Tour;
use App\Http\Requests\TourRequest;
use Session, FileManager;

class ToursController extends Controller
{
    public $view_data = [
        'title' => 'Tours',
        'tours' => 'active'
    ];

    public function index(Request $request){
        $this->view_data['tours_list'] = Tour::getTours($request);
        return view('content/tours/tours_index', $this->view_data);
    }

    public function deleteBlog(Request $request){
        Tour::deleteBlog($request['id']);
    }

    public function create(){
        Session::forget('files');
        FileManager::cleanUselessFiles(public_path('images\\tours\\content_images\\'));
        $this->view_data['title'] .= ' Create';
        return view('content/tours/tours_create', $this->view_data);
    }

    public function store(TourRequest $request){
        if(Tour::store($request)){
            return redirect('/tours');
        }
    }

    public function update(TourRequest $request, $id){
        if(Tour::updateTour($request, $id)){
            return redirect('/tours');
        }
    }

    public function ajaxRequest(Request $request){

        if(in_array( $request['method'], ['activeTour', 'deleteTour', 'imageUpload', 'removeFileFrom', 'deleteImage'])){
            $method = $request['method'];
            $this->$method($request);
        }else{
            return 'Error';
        }
    }

    public function deleteImage($request){
        Tour::deleteImage($request);
    }

    public function removeFileFrom($request){
        Tour::removeFileFrom($request['fileName']);
    }

    public function imageUpload($request){
        Tour::imageUpload($request['file']);
    }

    public function deleteTour(Request $request){
        Tour::deleteTour($request['id']);
    }

    public function activeTour(Request $request){
        Tour::activeTour($request);
    }

    public function edit(Request $request, $id){
        Session::forget('files');
        $this->view_data['tour'] = Tour::getTour($id);
        FileManager::setFilesSession($this->view_data['tour']->content_images);
        $this->view_data['title'] .= ' Edit';
        return view('content/tours/tours_edit', $this->view_data);
    }

    public function show(Request $request, $id){
        $this->view_data['tour'] = Tour::getTour($id);
        if($this->view_data['tour']){
            $this->view_data['title'] = ' Tour';
            return view('content/tours/tours_view', $this->view_data);
        }
        return abort(404);
    }
}
