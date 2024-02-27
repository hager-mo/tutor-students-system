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
    {{ Form::open(['url'=>'students', 'method'=>'post']) }}

    <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">IDno</label>
    {{ Form::text('IDno', null, ['class'=>'form-control', 'placeholder'=>'IDno']) }}
    </div>
    <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Name</label>
    {{ Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Name']) }}
    </div>
    <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Age</label>
    {{ Form::text('age', null, ['class'=>'form-control', 'placeholder'=>'age']) }}
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>

     {{ Form::close() }} 
</div>

@endsection