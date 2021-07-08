@extends('layouts.app')
@section('css')
    <style>
        label {
            font-family: Arial, Helvetica, sans-serif;
        }

        .textosLabel {
            font-size: 1rem;
            font-weight: bold;
        }

        .nav-link {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 1rem;
            font-weight: bold;
            color: darkgray;
        }

        .nav-link:hover {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 1rem;
            font-weight: bold;
            color: darkgray;
        }

        .nav-tabs .nav-link.active {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 1rem;
            font-weight: bold;
            color: #000;
        }

        thead th {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 1rem;
            font-weight: bold;
            color: #000;
        }

    </style>
@endsection
@section('content')
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

    <div id="data" style="display: none;">{{ $cnpj }}</div>

    <div class="col-md-12" style="margin: 0 0 0 15px;">
        <div class="col-md-8" style="margin-top: 60px;">
            <label id="nome"></label>
            <br>
            <label id="cnpj"></label>
            <br>
            <label id="fiscal_descricao"></label>
        </div>
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home"
                    aria-selected="true">Informações</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile"
                    aria-selected="false">Atividade Econômica</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact"
                    aria-selected="false">Sócios</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

                <div class="row">
                    <div class="col-md-3">
                        <label class="textosLabel">Nome empresarial:</label>
                        <div class="">
                            <label id="nome_empresarial"></label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label class="textosLabel">Número da inscrição:</label>
                        <div class="">
                            <label id="numero_inscricao"></label> -
                            <label id="numero_inscricao_matriz"></label>
                        </div>

                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <label class="textosLabel">Data da abertura:</label>
                        <div class="">
                            <label id="data_inicio_atividade"></label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label class="textosLabel">Última atualização:</label>
                        <div class="">
                            <label id="ultima_atualizacao"></label>
                        </div>

                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <label class="textosLabel">Logradouro:</label>
                        <div class="">
                            <label id="logradouro"></label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label class="textosLabel">Número:</label>
                        <div class="">
                            <label id="numero"></label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2">
                        <label class="textosLabel">CEP:</label>
                        <div class="">
                            <label id="cep"></label>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <label class="textosLabel">Bairro:</label>
                        <div class="">
                            <label id="bairro"></label>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <label class="textosLabel">Município:</label>
                        <div class="">
                            <label id="municipio"></label>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <label class="textosLabel">UF:</label>
                        <div class="">
                            <label id="uf"></label>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3">
                        <label class="textosLabel">Telefone:</label>
                        <div class="">
                            <label id="telefone_1"></label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <label class="textosLabel">Capital Social:</label>
                        <div class="">
                            <label id="capital_social"></label>
                        </div>

                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <table id="table_atividade_eco" class="table table-striped"></table>
            </div>
            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                <table id="table_socio" class="table table-striped"></table>
            </div>
        </div>

    </div>

@endsection



@section('scripts2')

    <script src="{{ asset('js/resultadoPesquisaCNPJ.js') }}"></script>



@endsection
