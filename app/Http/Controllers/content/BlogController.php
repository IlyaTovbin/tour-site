<?php

namespace App\Http\Controllers\content;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\content\Category;

class BlogController extends Controller
{
    public function index(){
        $view_data['title'] = 'Blog';
        $view_data['blog'] = 'active';
        $view_data['categories'] = Category::getCategories();
        return view('content/blog/blog_index', $view_data);
    }

    public function ajaxRequest(Request $request){

        if(in_array( $request['method'], ['saveCategory', 'deleteCategory', 'editCategory'])){
            $method = $request['method'];
            $this->$method($request);
        }else{
            return 'Error';
        }
    }

    public function saveCategory($request){
        Category::saveCategory($request['name']);
    }

    public function editCategory($request){
        Category::editCategory($request['id'], $request['value']);
    }

    public function deleteCategory($request){
        Category::deleteCategory($request['id']);
    }
}
