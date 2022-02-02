<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\Paginator;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    /*public function index()
    {
        return view('home');
    }*/
    public function index(){
        //$posts=Auth::user()->posts()->orderby('created_at','desc')->paginate(10);
        $posts=Auth::user()->posts()->orderby('created_at','asc')->paginate(10);
        $data=[
            'posts'=>$posts,
        ];
        return view('home',$data);
    }
}
