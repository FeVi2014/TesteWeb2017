<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Post;

class PageController extends Controller
{

    public function index(){
        $posts = Post::orderBy('created_at','desc')->paginate(6);
        $title = 'Negociações Web';

        return view('pages.index', compact('title'))->with('posts',$posts);;


    } 
    public function cadastro(){
        return view('pages.cadastro');
    
        } 
    public function login(){
        return view('pages.login');
        
     } 



}
