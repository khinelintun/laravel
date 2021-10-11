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
                Contents
            </div>
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
                <form action="/posts" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Name</label>
                        <input type="text" class="form-control {{ ($errors->first('name') ? "form-error" : "")}}" name="name" placeholder="Enter Name" value="{{ old('name') }}">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail2" class="form-label">Description</label>
                        <textarea name="description" class="form-control {{ ($errors->first('name') ? "form-error" : "")}}" placeholder="Enter Description" >{{ old('description') }}</textarea>
                    </div>
                    <div class="form-group mb-2">
                        <select name="category_id" class="form-select form-select-sm {{ ($errors->first('name') ? "form-error" : "")}}">
                            <option value="">Select Category</option>
                            @foreach($categories as $cat)
                                <option value="{{$cat->id}}">{{$cat->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                    <a href="/posts" class="btn btn-success btn-sm"> Back </a>
                </form>
            </div>
        </div>
    </div>

@endsection


