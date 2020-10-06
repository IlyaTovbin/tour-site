<?php

namespace App\Http\Controllers\content;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\content\Category;
use App\Models\content\Blog;
use App\Http\Requests\BlogRequest;
use Session, FileManager;

class BlogController extends Controller
{
    public $view_data = [
        'title' => 'Blog',
        'blog' => 'active'
    ];

    public function index(Request $request){
        $this->view_data['posts'] = Blog::getPosts($request);
        $this->view_data['relevant_categories'] = Category::getCategories(Blog::getPosts());
        return view('content/blog/blog_index', $this->view_data);
    }

    public function ajaxRequest(Request $request){
        if(in_array( $request['method'], ['deleteBlog', 'activePost', 'imageUpload', 'removeFileFrom'])){
            $method = $request['method'];
            $this->$method($request);
        }else{
            return 'Error';
        }
    }

    public function removeFileFrom($request){
        Blog::removeFileFrom($request['fileName']);
    }

    public function imageUpload($request){
        Blog::imageUpload($request['file']);
    }

    public function activePost(Request $request){
        Blog::activePost($request);
    }

    public function deleteBlog(Request $request){
        Blog::deleteBlog($request['id']);
    }

    public function create(){
        Session::forget('files');
        FileManager::cleanUselessFiles(public_path('images\\blogs\\content_images\\'));
        $this->view_data['title'] .= ' Create';
        $this->view_data['categories'] = Category::getCategories();
        return view('content/blog/blog_create', $this->view_data);
    }

    public function store(BlogRequest $request){
        if(Blog::store($request)){
            return redirect('/blog');
        }
    }

    public function edit(Request $request,int $id){
        Session::forget('files');
        $this->view_data['post'] = Blog::getPost($id);
        $this->view_data['title'] .= ' Edit';
        $this->view_data['categories'] = Category::getCategories();
        return view('content/blog/blog_edit', $this->view_data);
    }

    public function update(BlogRequest $request, $id){
        if(Blog::updatePost($request, $id)){
            return redirect('/blog');
        }
    }

    public function show(Request $request, $id){
        $this->view_data['post'] = Blog::getPost($id);
        if($this->view_data['post']){
            $this->view_data['category'] = Category::getCategory($this->view_data['post']->categorie_id);
            $this->view_data['title'] = ' Post';
            return view('content/blog/blog_post_view', $this->view_data);
        }
        return abort(404);
    }
}
