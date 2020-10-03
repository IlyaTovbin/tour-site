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
        $this->view_data['categories'] = Category::getCategories();
        return view('content/category/category_index', $this->view_data);
    }

    // public function deleteBlog(Request $request){
    //     Blog::deleteBlog($request['id']);
    // }

    public function show(Request $request, $id){
        $this->view_data['category'] = Category::getCategory($id);
        $this->view_data['title'] = ' Category';
        return view('content/category/category_view', $this->view_data);
    }

    public function create(){
        $this->view_data['title'] .= ' Create';
        return view('content/category/category_create', $this->view_data);
    }

    public function store(CategoryRequest $request){
        if(Category::saveCategory($request)){
            return redirect('/categories');
        }
    }

    public function edit(Request $request, $id){
        $this->view_data['category'] = Category::getCategory($id);
        $this->view_data['title'] .= ' Edit';
        return view('content/category/category_edit', $this->view_data);
    }

    // public function update(BlogRequest $request, $id){
    //     if(Blog::updatePost($request, $id)){
    //         return redirect('/blog');
    //     }
    // }

}
