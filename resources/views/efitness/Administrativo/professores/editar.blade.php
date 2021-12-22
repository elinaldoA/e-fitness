@extends('layouts.admin')

@section('main-content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">{{ __('Professores') }}</h1>

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
                <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-edit"></i> Editar</h6>
            </div>

            <div class="card-body">

                <form method="POST" action="{{ route('Alterar_professor', ['id' => $professores->id]) }}" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <ul class="nav nav-tabs nav-tabs-line nav-tabs-bold nav-tabs-line-3x nav-tabs-line-brand" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tab_informacoes" role="tab">
                                Informações
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
                                        <input type="checkbox" name="active" value="1" class="form-control"
                                           @if( ($professores->active == 0 && old('active') && old('first_time')) || ($professores->active && old('active') == null && old('first_time') == null) || ($professores->active && old('active') && old('first_time') ) )
                                           checked="checked"
                                        @endif
                                    >
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="nome">Nome<span class="small text-danger"> * </span></label>
                                        <input type="text" id="nome" class="form-control" name="nome" placeholder="Nome fantasia" value="{{$professores->nome}}">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="sexo">Sexo<span class="small text-danger"> * </span></label>
                                        <select name="sexos_id" id="sexos_id" class="form-control">
                                            @foreach($sexos as $sexo)
                                            <option {{ $professores->sexos_id == $sexo->id ? 'selected' : '' }}  value="{{ $sexo->id }}">{{$sexo->nome}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="estado_civil_id">Estado cívil<span class="small text-danger"> * </span></label>
                                        <select name="estado_civil_id" id="estado_civil_id" class="form-control">
                                            @foreach($estados_civils as $estadoCivil)
                                            <option {{ $professores->estado_civils_id == $estadoCivil->id ? 'selected' : '' }}  value="{{ $estadoCivil->id }}">{{$estadoCivil->nome}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="nascimento">Nascimento<span class="small text-danger"> * </span></label>
                                        <input type="date" class="form-control" id="nascimento" name="nascimento" value="{{$professores->nascimento}}">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="nome">Cpf<span class="small text-danger"> * </span></label>
                                        <input type="text" id="cpf" class="form-control" name="cpf" placeholder="Somente números" maxlength="15" onkeypress="mascara(this, '###.###.###-##')" onkeyup="somenteNumeros(this);" value="
                                        {{$professores->cpf}}">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="email">E-mail<span class="small text-danger"> * </span></label>
                                        <input type="email" id="email" class="form-control" name="email" placeholder="example@servidor.com.br" value="{{$professores->email}}">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="password">Senha<span class="small text-danger"> * </span></label>
                                        <input type="password" class="form-control" name="password" id="password" value="{{$professores->password}}">
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="email">Telefone<span class="small text-danger"> * </span></label>
                                        <input type="text" id="telefone" class="form-control" name="telefone" placeholder="Somente números" onkeypress="mascara(this, '## #####-####')" maxlength="13" value="{{$professores->telefone}}">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="image">Imagem<span class="small text-danger"> * </span></label>
                                        <input type="file" id="image" class="form-control" name="image" class="form-control" placeholder="imagem">
                                        <br />
                                        <img src="/image/{{ $professores->image }}" width="200px" class="img-thumbnail">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="tab_endereco" role="tabpanel"><br />
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group focused">
                                    <label class="form-control-label" for="rua">Rua<span class="small text-danger"> * </span></label>
                                    <input type="text" id="rua" class="form-control" name="rua" placeholder="Rua, Logradouro, Avenida, Travessa ..." value="{{$enderecos->rua}}">
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group focused">
                                    <label class="form-control-label" for="numero">Número<span class="small text-danger"> * </span></label>
                                    <input type="text" id="numero" class="form-control" name="numero" placeholder="1234" onkeyup="somenteNumeros(this);" value="{{$enderecos->numero}}">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group focused">
                                    <label class="form-control-label" for="complemento">Complemento<span class="small text-danger">*</span></label>
                                    <input type="text" id="complemento" class="form-control" name="complemeto" placeholder="Perto de..." value="{{$enderecos->complemento}}">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group focused">
                                    <label class="form-control-label" for="bairro">Bairro<span class="small text-danger"> * </span></label>
                                    <input type="text" id="bairro" class="form-control" name="bairro" placeholder="Bairro" value="{{$enderecos->bairro}}">
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group focused">
                                    <label class="form-control-label" for="cep">Cep<span class="small text-danger"> * </span></label>
                                    <input type="text" id="cep" class="form-control" name="cep" placeholder="Somente números" 
                                    onkeypress="mascara(this,'#####-###')" value="{{$enderecos->cep}}">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group focused">
                                    <label class="form-control-label" for="cidade">Cidade<span class="small text-danger">*</span></label>
                                    <input type="text" id="cidade" class="form-control" name="cidade" placeholder="Sua cidade" value="{{$enderecos->cidade}}">
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group focused">
                                    <label class="form-control-label" for="estado">Estado<span class="small text-danger"> * </span></label>
                                    <input type="text" id="estado" class="form-control" name="estado" placeholder="Es" maxlength="2" value="{{$enderecos->estado}}">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group focused">
                                    <label class="form-control-label" for="pais">País<span class="small text-danger"> * </span></label>
                                    <input type="text" id="pais" class="form-control" name="pais" placeholder="Brasil" value="{{$enderecos->pais}}">
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
                                <a href="{{route('professores.create')}}" class="btn btn-outline-primary"><i class="fas fa-angle-double-left"></i> voltar</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
<!---Mascaras para campos especificos--->
<script language="JavaScript">
    function mascara(t, mask) {
        var i = t.value.length;
        var saida = mask.substring(1, 0);
        var texto = mask.substring(i)
        if (texto.substring(0, 1) != saida) {
            t.value += texto.substring(0, 1);
        }
    }
</script>
<script language="JavaScript">
    function somenteNumeros(num) {
        var er = /[^0-9.^/^-]/;
        er.lastIndex = 0;
        var campo = num;
        if (er.test(campo.value)) {
            campo.value = "";
        }
    }
</script>