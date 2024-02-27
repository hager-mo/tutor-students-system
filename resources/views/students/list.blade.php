@extends('layouts.app') 

@section('content') 

<div class="container mt-5 ">
    @if(session('success'))
    <div class="alert alert-success">
        {{session('success')}}
    </div>
    @endif
    <div class=" border-bottom mb-4 row pb-2">
        <div class="col-3 ">
            <a href="{{route('students.create')}}" class="btn btn-success col-3">New</a>
        </div>
        <div class="col-6 text-center">
            <h2 class=""><b>Students</b></h2>
        </div>
    </div>
    <table class="table table-striped table-hover">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">IDno</th>
        <th scope="col">Name</th>
        <th scope="col">Age</th>
        <th scope="col">Update</th>
        <th scope="col">Delete</th>
        </tr>
    </thead>
    <tbody>
        @foreach($students as $s)
        <tr>
        <th scope="row">{{$s->id}}</th>
        <td>{{$s->IDno}}</td>
        <td>{{$s->name}}</td>
        <td>{{$s->age}}</td>
        <td>
            <a class="btn btn-warning" href="{{ url('students/'.$s->id.'/edit') }}">Update</a>
        </td>
        <td>
            <!-- <a class="btn btn-danger" href="{{ url('students/'.$s->id) }}">Delete</a> -->
            {{ Form::open(['route'=>['students.delete', $s->id], 'method'=>'delete'])}}
                @csrf
                <!-- @method('Delete') -->
                <input type="submit" value="Delete" class="btn btn-danger">
            {{ Form::close() }}
        </td>
        </tr>
        @endforeach
    
        
    </tbody>
    </table>
</div>

@endsection
