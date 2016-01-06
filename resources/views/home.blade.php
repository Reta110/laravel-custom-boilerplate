@extends('layout')

@section('content')

    <!-- Button trigger modal -->

    {!! Form::open(array('url' => '/home', 'class' => 'form-inline ')) !!}

    <div class="panel panel-info">
        <div class="panel-heading">
            <h3 class="panel-title">Elige la versión de Laravel</h3>
        </div>
        <div class="panel-body">
            <div class="checkbox col-md-12">
                <label> Laravel 5.1</label>
                <input type="radio" name="version" value="5.1" checked>
            </div>
        </div>

    </div>

    <div class="panel panel-info">
        <button type="button" class="btn btn-primary btn-sm pull-right" data-toggle="modal" data-target="#myModal">
            Agregar componente
        </button>

        <div class="panel-heading">
            <h3 class="panel-title">Elige los componentes</h3>
        </div>
        <div class="panel-body">
            @foreach($packages as $package)

                <div class="checkbox col-md-3">

                    <label>{{$package->name}}</label>
                    <input type="checkbox" name="{{$package->id}}">

                </div>

            @endforeach
        </div>

    </div>

    <p class="top-buffer ">
        <button type="submit" class="btn btn-success btn-block center-block">Generar archivos</button>
    </p>

    {!! Form::close() !!}

    @if (session('content'))
        <div class="alert alert-danger">
           Bajar tu copia fresca de Laravel 5.1:
        </div>

        <!-- Trigger -->
        <h2>1. Copia código generado: composer.json  y sustituye el tuyo.  <button type="button" class="btn btn-info allright" data-clipboard-target="#code">Copy to clipboard</button></h2>


        <!-- 2. Include library -->
        <script src="https://cdn.jsdelivr.net/clipboard.js/1.5.5/clipboard.min.js"></script>

        <!-- 3. Instantiate clipboard by passing a list of HTML elements -->


        <!-- Target -->
        <pre class="language-none line-numbers" id="code"><code>{{ session('content') }}</code>
        </pre>
        <div class="alert alert-danger">
            Ejecuta en la consola <strong>composer update</strong>
        </div>
        <!-- Trigger -->
        <h2>2. Ahora copia código generado: config/app.php  y sustitutye el tuyo.   <button type="button" class="btn btn-info allright" data-clipboard-target="#codeApp">Copy to clipboard</button></h2>

        <!-- Target -->
        <pre class="language-none line-numbers" id="codeApp"><code>{{ session('configApp') }}</code>
        </pre>

        <script>
            var btns = document.querySelectorAll('button');
            var clipboard = new Clipboard(btns);
            clipboard.on('success', function(e) {
                console.log(e);
            });
            clipboard.on('error', function(e) {
                console.log(e);
            });
        </script>

        @if (session('publish') != "")
        <h2>3. Ejecuta en la consola los vendor publish correspondientes (Uno por uno)</h2>
        <pre class="language-none line-numbers" id="codeApp"><code>{{ session('publish') }}</code>
        </pre>
        @endif

    @endif

@include('addPackage')

@endsection