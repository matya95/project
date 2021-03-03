@extends('layouts.layout')
@section('content')
    <div class="container">
        {{Form::open(['route' => ['projects.update',$project->id],'method' => 'POST'])}}
        {{Form::label('email', 'Név')}}
        {{Form::text('name','',['class'=>'form-control'])}}
        {{Form::label('description', 'Leírás')}}
        {{Form::textarea('description','',['class'=>'form-control'])}}
        {{Form::label('description', 'Státusz')}}
        {{Form::select('status', ['not dev'=>'Fejlesztésre vár', 'developing' => 'Folyamatban','ready'=>'kész'],null,['class'=>'form-control'])}}
       {{Form::hidden('_method','PUT')}}
        {{Form::submit('Küldés!',['class'=>'btn btn-primary mt-4'])}}
    </div>
@endsection
