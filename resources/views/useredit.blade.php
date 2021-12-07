@extends('layouts.master')

@section('content')
<div class="container mt-3">
    <div class="row py-2">
        <div class="col-sm-4 mx-auto">
            <h2 class="text-primary py-3">Edit Form</h2>
            @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <form method="POST" action="{{ route('update',$userdata->id) }}">
                @csrf
                <div class="form-group">
                    <label for="exampleInputPassword1">Username</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" name="username" value="{{$userdata->username}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" name="email" value="{{$userdata->email}}">
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
                <button class="btn btn-primary"><a href="{{ route('passwordchange',$userdata->id) }}" class="text-light" style="text-decoration: none">Change your Password</a></button>
                
            </form>
        </div>
    </div>
</div>

@endsection