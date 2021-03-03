<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@extends('layouts.layout')
@section('content')
    <div class="container">
        <ul className="list-group">
            @foreach($projects as $project)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    {{$project->name}}
                    <a href="/projects/<?=$project->id?>/edit">
                </li>
            @endforeach
        </ul>
    </div>

@endsection
</html>
