@extends('layout')

@section('content')

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary btn-sm pull-right" data-toggle="modal" data-target="#myModal">
        Agregar paquete
    </button>
    {!! Form::open(array('url' => '/home', 'class' => 'form-inline ')) !!}

            <h2>Elige los componentes</h2>

            @foreach($packages as $package)

                <div class="checkbox col-md-3">
                    <label>
                        <input type="checkbox" name="{{$package->id}}"> {{$package->name}}
                    </label>
                </div>

            @endforeach

    <p class="top-buffer ">
        <button type="submit" class="btn btn-success btn-block center-block">Generar archivos</button>
    </p>


    {!! Form::close() !!}

    @if (session('content'))
        <div class="alert alert-info">
           Luego de bajar tu copia fresca de Laravel:
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

        @if (session('publish'))
        <h2>3. Ejecuta en la consola los vendor publish correspondientes (Uno por uno)</h2>
        <pre class="language-none line-numbers" id="codeApp"><code>{{ session('publish') }}</code>
        </pre>
        @endif

    @endif

@include('addPackage')

@endsection