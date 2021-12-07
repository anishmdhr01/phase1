@extends('layouts.master')

@section('content')
<div class="container mt-3">
    <div class="row py-2">
        <div class="col-sm-4 mx-auto">
            <h2 class="text-danger py-3">Registration Form</h2>

            @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <form action="{{route('registered')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="exampleInputPassword1">Username</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" name="username" placeholder="Username">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp" placeholder="Enter email">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Password">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Confirm Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" name="cpassword" placeholder="Password">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>

@endsection