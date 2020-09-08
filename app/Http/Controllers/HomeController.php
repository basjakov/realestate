<?php

namespace App\Http\Controllers;

use App\announcement;
use App\ancmtImages;

use Illuminate\Http\Request;

//working with storage
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Detail;

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
    public function index()
    {
        $ancts = announcement::orderBy('created_at', 'desc')->paginate(10);
        $anct_images = ancmtImages::all();
        return view('profile',compact('ancts','anct_images'));
    }
}
