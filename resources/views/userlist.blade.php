@extends('layouts.master')

@section('content')
<div class="container py-2">
    <h3 class="text-primary py-2 text-center">User List</h3>
    @if(session()->has('success'))
    <div class="alert alert-success">
            {{session()->get('success')}}
    </div>
    @endif
    <table class="table table-striped mt-3" method="POST">
        <tr>
            <th>User_Name</th>
            <th>Email</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        @foreach ($userdata as $data)
        <tr>
            <td>{{$data->username}}</td>
            <td>{{$data->email}}</td>
            <td><div class="d-flex" >
                <a href="{{ route('useredit',$data->id) }}" class="px-3"> <i class="fas fa-user-edit"></i>Edit</a>
                </div> 
            </td>
            <td>
                <div class="d-flex" >
                    <a href="{{ route('delete',$data->id) }}"> <i class="far fa-trash-alt"></i>Delete</a>
                </div> 
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection