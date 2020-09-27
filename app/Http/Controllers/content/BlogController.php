<?php

namespace App\Http\Controllers\content;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\content\Category;
use App\Models\content\Blog;
use App\Http\Requests\BlogRequest;

class BlogController extends Controller
{
    public $view_data = [
        'title' => 'Blog',
        'blog' => 'active'
    ];

    public function index(Request $request){
        $this->view_data['categories'] = Category::getCategories();
        $this->view_data['posts'] = Blog::getPosts($request);
        return view('content/blog/blog_index', $this->view_data);
    }

    public function ajaxRequest(Request $request){

        if(in_array( $request['method'], ['saveCategory', 'deleteCategory', 'editCategory', 'deleteBlog'])){
            $method = $request['method'];
            $this->$method($request);
        }else{
            return 'Error';
        }
    }

    public function deleteBlog($request){
        Blog::deleteBlog($request['id']);
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

    public function create(){
        $this->view_data['title'] .= ' Create';
        $this->view_data['categories'] = Category::getCategories();
        return view('content/blog/blog_create', $this->view_data);
    }

    public function store(BlogRequest $request){
        if(Blog::store($request)){
            $view_data['categories'] = Category::getCategories();
            return redirect('/blog');
        }
    }
}
