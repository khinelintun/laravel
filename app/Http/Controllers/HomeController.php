<?php

namespace App\Http\Controllers;

use App\Mail\PostStored;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use function abort;
use function auth;
use function dd;
use function view;
use App\Models\Post;
use function compact;
use function redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Requests\storePostRequest;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
//      $data = Post::all();

//        Mail::raw('hello world', function ($msg){
//            $msg->to('khinelintun567@gmail.com')->subject('AP Index function');
//        });

        $data = Post::where('user_id',auth()->id())->orderBy('id','desc')->get();
       return view('home', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store (storePostRequest $request)
    {
//        Post::create([
//            'name' => $request->name,
//            'description'=>$request->description,
//            'category_id'=>$request->category,
//        ]);
         //Retrieve the validated input data...
//
        $validated = $request->validated();
        Post::create($validated + ['user_id'=>Auth::user()->id]);

//        Mail::to('harrylin567@gmail.com')->send(new PostStored());

        return redirect('/posts')->with('status', 'successfully created');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
//        if ($post->user_id != auth()->id()){
//            abort(403);
//        }
        $this->authorize('view',$post);
        return view('show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
//        if ($post->user_id != auth()->id()){
//            abort(403);
//        }
        $this->authorize('view',$post);
        $categories = Category::all();
        return view('edit', compact('post','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(storePostRequest $request, Post $post)
    {
        // $post = Post::findOrFail($id); //old data
        $request->validate([
            'name' => 'required|max:30',
            'description' => 'required|max:255',
        ]);

//        $post -> name = $request->name;  // update data
//        $post->description = $request->description;
//        $post->save();
//        'name'=>$request->name,
//        'description'=>$request->description,
//        'category_id'=>$request->category_id,
        $validated = $request->validated();
        $post->update($validated);
        return redirect('/posts')->with('status', 'successfully updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect('/posts')->with('status', 'successfully deleted');

    }
}
