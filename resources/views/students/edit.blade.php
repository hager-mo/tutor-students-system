@extends('layouts.app')

@section('content')
<div class="container">
    @if($errors->any())
    <div class="alert alert-warning">
        <ul>
            @foreach($errors->all() as $err)
            <li>{{$err}}</li>
            @endforeach
        </ul>
    </div>
    @endif
    {{ Form::open(['route'=>['students.update', $student->id], 'method'=>'put'])}}
    <!-- echo $id; -->
    <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">IDno</label>
    {{ Form::text('IDno', old('IDno', $student->IDno), ['class'=>'form-control']) }}
    </div>
    <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Name</label>
    {{ Form::text('name', old('name', $student->name), ['class'=>'form-control'] ) }}
    </div>
    <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Age</label>
    {{ Form::text('age', old('age', $student->age), ['class'=>'form-control']) }}
    </div>

    <button type="submit" class="btn btn-primary">update</button>

     {{ Form::close() }} 
</div>

@endsection
