<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@extends('layouts.layout')
@section('content')
    <div class="container mb-5">
        <div class="filter float-right">
            <form method="get">

                <select class="form-control" name="filter" onchange="this.form.submit()">
                <option value="all">Szűrés</option>
                <option value="all">Összes</option>
                <option value="not_dev">Fejlesztésre vár</option>
                <option value="developing">Folyamatban</option>
                <option value="ready">Kész</option>

                </select>

            </form>

        </div>
    </div>
    @if($errors->any())
        <div class="alert alert-success">
            <ul>
                <span class="m-auto">{{$errors->first()}}</span>
            </ul>
        </div>
        <h4></h4>
    @endif

    <div class="container">
        <div class="row w-100">
        <a href="{{route('projects.create')}}" class="btn btn-success float-right mb-5">Projekt létrehozása</a>
        </div>
       <div class="row"> <ul class="list-group w-100">
               @if(count($projects)>0)
            @foreach($projects as $project)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    {{$project->name}}
                    <div class="status">
                        {{__($project->status)}}
                    </div>
                    <div class="numbers">
                        {{count($project->contacters)}}Kapcsolattartó
                    </div>
                    <div class="actions f-left">
                   <a href="{{route('projects.edit',$project->id)}}" class="btn btn-primary">Szerkesztés</a>
                   <a class="btn btn-danger" onclick="deleteproj({{$project->id}},this)">Törlés</a>
                    </div>
                </li>
            @endforeach
                   @else
                   <span>Nins egyetlen projekt sem</span>
                   @endif
        </ul>
        </div>
        {{ $projects->links("pagination::bootstrap-4") }}
    </div>
<script>
    function deleteproj(id,element){
        let removelement=element.parentElement.parentElement;
        $.ajax({
            url: '/projects/'+id,
            type: 'DELETE',
            async: false,
            data:{
                'id': id,
                '_token': '{{ csrf_token() }}',
            },
            success: function () {
               removelement.remove();
            },
            error: function (xhr) {
                console.log("asd");
            }
        });

    }
</script>
@endsection
</html>

