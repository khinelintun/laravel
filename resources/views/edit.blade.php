@extends('layout')

@section('content')
<style>
    .form-error{
        border: 1px solid red;
    }
</style>
    <div class="container">
        <div class="card">
            <div class="card-header" style="text-align: center">
                Edit Post
            </div>
            @if (session('status'))
                <div class="alert alert-success alert-dismissible fade show mt-2">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    <strong></strong>{{ session('status') }}
                </div>
            @endif
            <div class="card-body">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

                <form action="/posts/{{$post->id}}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Name</label>
                        <input value="{{old('name', $post->name)}}" type="text" class="form-control {{ ($errors->first('name') ? "form-error" : "")}}"" name="name" placeholder="Enter Name" >
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail2" class="form-label">Description</label>
                        <textarea name="description" class="form-control {{ ($errors->first('description') ? "form-error" : "")}}"" placeholder="Enter Description" >{{old('description', $post->description)}}</textarea>
                    </div>
                    <div class="form-group mb-2">
                        <select name="category_id" class="form-select form-select-sm {{ ($errors->first('name') ? "form-error" : "")}}">
                            <option value="">Select Category</option>
                            @foreach($categories as $cat)
                                <option value="{{$cat->id}}" {{$cat->id == $post->category_id ? 'selected' : ''}}>{{$cat->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary btn-sm">Update</button>
                    <a href="/posts" class="btn btn-success btn-sm"> Back </a>
                </form>
            </div>
        </div>
    </div>

@endsection


