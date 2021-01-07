<?php

namespace App\Http\Controllers\Admin;
use App\Character;
use App\Movie;
use DB;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MovieController extends Controller
{
    public function home()
    {
        return view('admin.home');
    }
    
    public function add()
    {
        return view('admin.movie.insert');
    }
    
    public function register(Request $request) 
    {
        
        return redirect('admin/movie/insert');
    }
    
    public function index()
    {
        return view('admin.movie.index');
    }
    
}