@extends('layout')

@section('content')

    <!-- Button trigger modal -->

    {!! Form::open(array('url' => '/home', 'class' => 'form-inline ')) !!}

    <div class="panel panel-info">
        <div class="panel-heading">
            <h3 class="panel-title">Select the Laravel's version</h3>
        </div>
        <div class="panel-body">
            <div class="checkbox col-md-12">
                <label> Laravel 5.1</label>
                <input type="radio" name="version" value="5.1" checked>
            </div>
        </div>

    </div>

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul class="list-inline">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="panel panel-info">
        <p class="text-right pull-right">
            <button type="button" class="btn btn-primary btn-xs margin-top-8 margin-right-10" data-toggle="modal" data-target="#myModal">
                Add new component
            </button>
        </p>

        <div class="panel-heading">
            <h3 class="panel-title">Choose your components</h3>
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
        <button type="submit" class="btn btn-success btn-block center-block">Generate files</button>
    </p>

    {!! Form::close() !!}

    @if (session('content'))
        <div class="alert alert-danger">
           Download your fresh copy of Laravel 5.1:
        </div>

        <!-- Trigger -->
        <h2>1. Copy this generated code: composer.json  and replace yours.  <button type="button" class="btn btn-info allright" data-clipboard-target="#code">Copy to clipboard</button></h2>


        <!-- 2. Include library -->
        <script src="https://cdn.jsdelivr.net/clipboard.js/1.5.5/clipboard.min.js"></script>

        <!-- 3. Instantiate clipboard by passing a list of HTML elements -->


        <!-- Target -->
        <pre class="language-none line-numbers" id="code"><code>{{ session('content') }}</code>
        </pre>
        <div class="alert alert-danger">
            Execute console command:<strong>composer update</strong>
        </div>
        <!-- Trigger -->
        <h2>2. Copy this generated code: config/app.php  and replace yours.   <button type="button" class="btn btn-info allright" data-clipboard-target="#codeApp">Copy to clipboard</button></h2>

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
        <h2>3. Execute in console this vendors publish (One by one)</h2>
        <pre class="language-none line-numbers" id="codeApp">
            <code>{{session('publish')}}</code>
        </pre>
        @endif

    @endif

@include('addPackage')

@endsection