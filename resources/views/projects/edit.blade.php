@extends('layouts.layout')
@section('content')
    <div class="container">
        {{Form::open(['route' => 'projects.store'])}}
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
                        {{Form::label('email', 'Név')}}
                        {{Form::text('names[]',$ct->name,['class'=>'form-control'])}}
                        {{Form::label('email', 'E-mail Cím')}}
                        {{Form::email('email[]',$ct->email,['class'=>'form-control'])}}

                    @endforeach
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
