<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use function dd;
use function Sodium\add;

class HomeController extends Controller
{
    public function index(){
           $data = Post::all();
//           dd($data);
            return view('home', compact('data'));
    }



}
