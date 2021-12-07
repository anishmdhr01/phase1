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
            @if(session()->has('success'))
                <div class="alert alert-danger">
                    {{session()->get('success')}}
                </div>
            @endif
            <form action="{{ route('updatepassword',$userdata->id) }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="exampleInputPassword1">Old Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" name="oldpassword" placeholder="Password">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">New Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" name="newpassword" placeholder="Password">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">COnfirm Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" name="confirmpassword" placeholder="Password">
                </div>
                <button type="submit" class="btn btn-primary">Change</button>
            </form>
        </div>
    </div>
</div>

@endsection