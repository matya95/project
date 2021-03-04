@extends('layouts.layout')
@section('content')
    <div class="container">
        {{Form::open(['route' => 'projects.store'])}}
        <div class="row">
            <div class="col-md-6">
                <h1>Projekt adatai</h1>
                {{Form::label('email', 'Név')}}
                {{Form::text('name','',['class'=>'form-control','required'])}}
                {{Form::label('description', 'Leírás')}}
                {{Form::textarea('description','',['class'=>'form-control','required'])}}
                {{Form::label('description', 'Státusz')}}
                {{Form::select('status', ['not_dev'=>'Fejlesztésre vár', 'developing' => 'Folyamatban','ready'=>'kész'],null,['class'=>'form-control'])}}

            </div>
            <div class="col-md-6">
                <h1>Kapcsolattartók adatai</h1>
                <div class="contacter">
                    {{Form::label('email', 'Név')}}
                    {{Form::text('names[]','',['class'=>'form-control'])}}
                    {{Form::label('email', 'E-mail Cím')}}
                    {{Form::email('email[]','',['class'=>'form-control'])}}
                    {{Form::button('Kapcsolattartó hozzáadása',['class'=>'btn btn-primary mt-2','onclick'=>'addcontacter(this)'])}}
                </div>
            </div>
        </div>
        {{Form::submit('Küldés!',['class'=>'btn btn-primary mt-4'])}}
    </div>
@endsection
<script>

    function addcontacter(element) {
        let elements=document.createElement("div");
       elements.innerHTML='  <label for="email">Név</label>\n' +
           '                    <input class="form-control" name="names[]" type="text" value="">\n' +
           '                    <label for="email">E-mail Cím</label>\n' +
           '                    <input class="form-control" name="email[]" type="email" value="">';
       element.before(elements);

    }
</script>
