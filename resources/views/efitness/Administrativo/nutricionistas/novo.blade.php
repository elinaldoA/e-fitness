@extends('layouts.admin')

@section('main-content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">{{ __('Nutricionistas') }}</h1>

@if (session('success'))
<div class="alert alert-success border-left-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

@if ($errors->any())
<div class="alert alert-danger border-left-danger" role="alert">
    <ul class="pl-4 my-2">
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="row">

    <div class="col-lg-12 order-lg-1">

        <div class="card shadow mb-4">

            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-hospital"></i> Adicionar nova</h6>
            </div>

            <div class="card-body">

                <form method="POST" action="{{ route('nutricionistas.create') }}" class="nutricionistas" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <ul class="nav nav-tabs nav-tabs-line nav-tabs-bold nav-tabs-line-3x nav-tabs-line-brand" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tab_informacoes" role="tab">
                                Informações
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tab_atendimentos" role="tab">
                                Atendimentos
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tab_endereco" role="tab">
                                Endereço
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content pl-lg-12">
                        <div class="tab-pane active" id="tab_informacoes" role="tabpanel"><br />
                            <div class="row">
                                <div class="col-lg-1">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="active">Ativo<span class="small text-danger"> * </span></label>
                                        <input type="checkbox" id="active" name="active" class="form-control" value="1" @if(old('active')) checked="checked" @endif required>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="nome">Nome<span class="small text-danger"> * </span></label>
                                        <input type="text" id="nome" class="form-control" name="nome" placeholder="Seu nome" required>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="nome">Sobrenome<span class="small text-danger"> * </span></label>
                                        <input type="text" id="sobrenome" class="form-control" name="sobrenome" placeholder="Seu sobrenome" required>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="cargos">Cargos<span class="small text-danger"> * </span></label>
                                        <select class="form-control" id="cargos_id" name="cargos_id">
                                            <option>Selecione uma opção</option>
                                            @foreach($cargos as $cargo)
                                            <option value="{{$cargo->id}}">{{$cargo->nome}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="sexos">Sexo<span class="small text-danger"> * </span></label>
                                        <input class="form-control" id="sexos" name="sexos">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="estados_civils">Estado civil<span class="small text-danger"> * </span></label>
                                        <input class="form-control" id="estado_civil" name="estado_civil">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="nascimento">Nascimento<span class="small text-danger"> * </span></label>
                                        <input type="date" id="nascimento" class="form-control" name="nascimento" required>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="cpf">Cpf<span class="small text-danger"> * </span></label>
                                        <input type="text" id="cpf" class="form-control" name="cpf" placeholder="Somente números" maxlength="15" onkeypress="mascara(this, '###.###.###-##')" onkeyup="somenteNumeros(this);" required>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="email">E-mail<span class="small text-danger"> * </span></label>
                                        <input type="email" id="email" class="form-control" name="email" placeholder="example@servidor.com.br" required>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="password">Senha<span class="small text-danger"> * </span></label>
                                        <input type="password" id="password" class="form-control" name="password" placeholder="Senha" required>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="telefone">Telefone<span class="small text-danger"> * </span></label>
                                        <input type="text" id="telefone" class="form-control" name="telefone" placeholder="Somente números" onkeypress="mascara(this, '## #####-####')" maxlength="13" required>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="image">Foto<span class="small text-danger"> * </span></label>
                                        <input type="file" id="image" class="form-control" name="image" class="form-control" placeholder="imagem">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="tab_atendimentos" role="tabpanel"><br />
                            <div class="row">
                                <div class="col-lg-4" id="lines">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="dia">Dia da semana<span class="small text-danger"> * </span></label>
                                        <select class="form-control" name="dia_da_semana" id="dia_da_semana">
                                            <option>Selecione uma opção</option>
                                            <option value="Segunda-feira">Segunda-feira</option>
                                            <option value="Terça-feira">Terça-feira</option>
                                            <option value="Quarta-feira">Quarta-feira</option>
                                            <option value="Quinta-feira">Quinta-feira</option>
                                            <option value="Sexta-feira">Sexta-feira</option>
                                            <option value="Sabádo">Sabádo</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="inicio">Inicio<span class="small text-danger"> * </span></label>
                                        <input type="time" id="inicio" class="form-control" name="inicio" required>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="fim">Fim<span class="small text-danger"> * </span></label>
                                        <input type="time" id="fim" class="form-control" name="fim" required>
                                    </div>
                                </div>
                            </div>
                            <a class="btn btn-outline-warning" onclick="addInput('lines')"><i class="fas fa-plus"></i> Adicionar</a>
                        </div>
                        <div class="tab-pane" id="tab_endereco" role="tabpanel"><br />
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="rua">Rua<span class="small text-danger"> * </span></label>
                                        <input type="text" id="rua" class="form-control" name="rua" placeholder="Rua, Logradouro, Avenida, Travessa ..." required>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="numero">Número<span class="small text-danger"> * </span></label>
                                        <input type="text" id="numero" class="form-control" name="numero" placeholder="1234" onkeyup="somenteNumeros(this);" required maxlength="4">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="complemento">Complemento<span class="small text-danger">*</span></label>
                                        <input type="text" id="complemento" class="form-control" name="complemento" placeholder="Perto de..." required>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="bairro">Bairro<span class="small text-danger"> * </span></label>
                                        <input type="text" id="bairro" class="form-control" name="bairro" placeholder="Bairro" required>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="cep">Cep<span class="small text-danger"> * </span></label>
                                        <input type="text" id="cep" class="form-control" name="cep" placeholder="Somente números" onkeypress="mascara(this,'#####-###')" maxlength="9" required>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="cidade">Cidade<span class="small text-danger">*</span></label>
                                        <input type="text" id="cidade" class="form-control" name="cidade" placeholder="Sua cidade" required>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="estado">Estado<span class="small text-danger"> * </span></label>
                                        <input type="text" id="estado" class="form-control" name="estado" placeholder="Es" maxlength="2" required>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="pais">País<span class="small text-danger"> * </span></label>
                                        <input type="text" id="pais" class="form-control" name="pais" placeholder="Brasil" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br />
                    <!-- Button -->
                    <div class="pl-lg-2">
                        <div class="row">
                            <div class="col">
                                <button type="submit" class="btn btn-outline-primary"><i class="far fa-save"></i> Salvar</button>
                                <a href="{{route('nutricionistas')}}" class="btn btn-outline-primary"><i class="fas fa-angle-double-left"></i> voltar</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
<script>
    var line = 1;

    function addInput(divName) {
        var newdiv = document.createElement('div');
        newdiv.innerHTML = '[' + line + ']';
        newdiv.innerHTML = '<div class="row">';
        newdiv.innerHTML = '<label class="form-control-label" for="dia">Dias de atendimento<span class="small text-danger"> * </span></label><select class="form-control" name="dia_da_semana' + line + '" id="dia_da_semana' + line + '"><option>Selecione uma opção</option><option value="Segunda-feira">Segunda-feira</option><option value="Terça-feira">Terça-feira</option><option value="Quarta-feira">Quarta-feira</option><option value="Quinta-feira">Quinta-feira</option><option value="Sexta-feira">Sexta-feira</option></select><br/>';
        newdiv.innerHTML += '<label class="form-control-label" for="inicial">Inicial<span class="small text-danger"> * </span></label><input class="form-control" type="time" name="inicio' + line + '" id="inicio' + line + '"><br/>';
        newdiv.innerHTML += '<label class="form-control-label" for="final">Final<span class="small text-danger"> * </span></label><input class="form-control" type="time" name="fim' + line + '" id="fim' + line + '"><br/>';
        newdiv.innerHTML += '<div>';
        document.getElementById(divName).appendChild(newdiv);
        line++;
    }
    addInput('lines');
</script>