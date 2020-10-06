<?php

namespace App\Http\Controllers\content;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\content\Category;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    public $view_data = [
        'title' => 'Category',
        'category_nav' => 'active'
    ];

    public function index(Request $request){
        $this->view_data['categories'] = Category::getCategories(false, $request);
        return view('content/category/category_index', $this->view_data);
    }

    public function show(Request $request, $id){
        $this->view_data['category'] = Category::getCategory($id);
        if($this->view_data['category']){
            $this->view_data['title'] = ' Category';
            return view('content/category/category_view', $this->view_data);
        }
        return abort(404);
    }

    public function create(){
        $this->view_data['title'] .= ' Create';
        return view('content/category/category_create', $this->view_data);
    }

    public function ajaxRequest(Request $request){
        if(in_array( $request['method'], ['deleteCategory'])){
            $method = $request['method'];
            $this->$method($request);
        }else{
            return 'Error';
        }
    }

    public function store(CategoryRequest $request){
        if(Category::saveCategory($request)){
            return redirect('/categories');
        }
        return 'Store category Error';
    }

    public function edit(Request $request, $id){
        $this->view_data['category'] = Category::getCategory($id);
        $this->view_data['title'] .= ' Edit';
        return view('content/category/category_edit', $this->view_data);
    }

    public function update(CategoryRequest $request, $id){
        if(Category::updateCategory($request, $id)){
            return redirect('/categories');
        }
    }

    private function deleteCategory(Request $request){
        Category::deleteCategory($request['id']);
    }

}
