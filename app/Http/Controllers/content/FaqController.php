<?php

namespace App\Http\Controllers\content;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\content\Faq;
use App\Http\Requests\FaqRequest;

class FaqController extends Controller
{
    public $view_data = [
        'title' => 'Faq',
        'faq_nav' => 'active'
    ];

    public function index(Request $request){
        $this->view_data['all_faq'] = Faq::getAllFaq($request);
        return view('content/faq/faq_index', $this->view_data);
    }

    public function ajaxRequest(Request $request){
        if(in_array( $request['method'], ['deleteFaq', 'activeFaq'])){
            $method = $request['method'];
            $this->$method($request);
        }else{
            return 'Error';
        }
    }

    public function activeFaq(Request $request){
        Faq::activeFaq($request);
    }

    public function deleteFaq(Request $request){
        Faq::deleteFaq($request['id']);
    }

    public function create(){
        $this->view_data['title'] .= ' Create';
        return view('content/faq/faq_create', $this->view_data);
    }

    public function store(FaqRequest $request){
        if(Faq::store($request)){
            return redirect('/faq');
        }
    }

    public function show(Request $request, $id){
        return abort(404);
    }

    public function edit(Request $request, $id){
        $this->view_data['faq'] = Faq::getFaq($id);
        $this->view_data['title'] .= ' Edit';
        return view('content/faq/faq_edit', $this->view_data);
    }

    public function update(FaqRequest $request, $id){
        if(Faq::updateFaq($request, $id)){
            return redirect('/faq');
        }
    }

}

