<?php

namespace App\Http\Controllers\content;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(){
        $view_data['title'] = 'Blog';
        $view_data['blog'] = 'active';
        return view('content/blog/blog_index', $view_data);
    }
}
