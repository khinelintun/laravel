@extends('layout')

@section('content')
    <div class="container">
        <div>
            <a href="/posts/create" class="btn btn-success btn-sm"> New Form</a>
            <a href="/logout" class="btn btn-warning btn-sm">logout</a>
            <p style="float:right">{{Auth::user()->name}}</p>
        </div>
        <div class="card">
            <div class="card-header" style="text-align: center">
                Contents
            </div>
            <div class="card-body">
                @foreach($data as $post)
                  <div>
                      <h5 class="card-title">{{$post -> name}}</h5>
{{--                      <p class="card-text">{{$post -> description}}</p>--}}
{{--                      <p class="card-text">{{$post -> categories->name}}</p>--}}
                      <a href="/posts/{{$post->id}}" class="btn btn-primary btn-sm">View</a>
                      <a href="/posts/{{$post->id}}/edit" class="btn btn-warning btn-sm">Edit</a>
                      <form action="/posts/{{$post->id}}" method="post" style="display: inline">
                          @csrf
                          @method('DELETE')
                          <button  type="submit" class="btn btn-danger btn-sm">Delete</button>
                      </form>
                  </div><hr>
                @endforeach

            </div>
        </div>
    </div>

@endsection


