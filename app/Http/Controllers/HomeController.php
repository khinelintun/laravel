<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
            $data = [
                'id' => '1',
                'name' => 'mgmg',
                'email' => 'mgmg@gmail.com',
            ];
            return view('home', compact('data'));
    }

    public function contact(){
        $data = [
            'table' => 'mgmg@gmail.com',
        ];
        return view('about', compact('data'));
    }

    public function about(){
        $data = [

            'database' => 'mgmg@gmail.com',
        ];
        return view('contact', compact('data'));
    }
}
