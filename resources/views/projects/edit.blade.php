@extends('layouts.layout')
@section('content')
    <div class="container">
        {{Form::open(['route' => ['projects.update',$project->id],'method'=>'Post'])}}
        <div class="row">
            <div class="col-md-6">
                <h1>Projekt adatai</h1>
                {{Form::label('email', 'Név')}}
                {{Form::text('name',$project->name,['class'=>'form-control','required'])}}
                {{Form::label('description', 'Leírás')}}
                {{Form::textarea('description',$project->description,['class'=>'form-control','required'])}}
                {{Form::label('description', 'Státusz')}}
                {{Form::select('status', ['not dev'=>'Fejlesztésre vár', 'developing' => 'Folyamatban','ready'=>'kész'],$project->status,['class'=>'form-control'])}}

            </div>
            <div class="col-md-6">
                <h1>Kapcsolattartók adatai</h1>

                <div class="contacter">
                    @foreach($contacters as $ct)
                        <div id="contacter{{$ct->id}}">
                        {{Form::label('email', 'Név')}}
                        {{Form::text('names[]',$ct->name,['class'=>'form-control'])}}
                        {{Form::label('email', 'E-mail Cím')}}
                        {{Form::email('email[]',$ct->email,['class'=>'form-control'])}}
                        {{Form::button('Kapcsolattartó törlése',['class'=>'btn btn-danger mt-2','onclick'=>'deletecontacter(this)'])}}
                        </div>
                    @endforeach
                        {{Form::button('Kapcsolattartó hozzáadása',['class'=>'btn btn-primary mt-2','onclick'=>'addcontacter(this)'])}}
                </div>
            </div>
        </div>
        {{Form::hidden('_method','PUT')}}
        {{Form::submit('Küldés!',['class'=>'btn btn-primary mt-4'])}}
    </div>
@endsection
<script>

    function addcontacter(element) {
        let elements=document.createElement("div");
        elements.innerHTML='  <label for="email">Név</label>\n' +
            '                    <input class="form-control" name="names[]" type="text" value="">\n' +
            '                    <label for="email">E-mail Cím</label>\n' +
            '                    <input class="form-control" name="email[]" type="email" value="">' +
            '<button class="btn btn-danger mt-2" onclick="deletecontacter(this)" type="button">Kapcsolattartó törlése</button>';
        element.before(elements);

    }
    function deletecontacter(element) {
      element.parentElement.remove();

    }
</script>
