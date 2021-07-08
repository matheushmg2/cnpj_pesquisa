@extends('layouts.app')
@section('css')
    <style>
        #testeError {
            width: 36%;
            margin: 17px 25%;
        }

    </style>
@endsection
@section('content')

    <div class="row" style="margin: auto">
        <div class="col-md-12">

        </div>

    </div>
    <div style="width: 100%">
        <div class="row" style="justify-content: center;">
            <div class="col-md-5">
                <h1 style="margin: 0px 0px 10px 90px;">Pesquisar CNPJ</h1>
            </div>
        </div>
    </div>
    {{ Form::open(['route' => 'cnpj.store', 'method' => 'POST']) }}
    <div style="width: 100%">

        <div class="row" style="justify-content: center;">
            <div class="col-md-3">
                <input type="text" class="form-control" id="pesquisa" onkeypress="MascaraCNPJ(pesquisa);" name="pesquisa"
                    maxlength="18" style="width: 16rem; margin-left: auto">
            </div>
            <div class="col-md-3">
                <input type="submit" value="Pesquisar" class="btn btn-outline-info" id="submit">
            </div>
        </div>
    </div>

    {{ Form::close() }}
    @isset($info)
        <div class="alert alert-danger alert-dismissible fade show" role="alert" id="testeError">
            <p class="errors" id="errors">{{ $info }}</p>
            <button class="close" type="button" data-dismiss="alert" aria-label="close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endisset

    <div class="timer">
        <h3 class="values" style="justify-content: center; width: 30%"></h3>
    </div>

@endsection




@section('scripts2')
    <script src="{{ asset('js/resultadoPesquisaCNPJ.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/easytimer@1.1.1/src/easytimer.min.js"></script>
    <script>
        var timer = new Timer();
        timer.start({
            countdown: true,
            startValues: {
                seconds: 5
            }
        });

        timer.addEventListener('targetAchieved', function(e) {
            if (document.getElementById('testeError') !== null) {
                document.getElementById('testeError').style.display = "none";
            }
        });
    </script>

@endsection
