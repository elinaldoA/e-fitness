@extends('layouts.Professores.professor')

@section('main-content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">{{ __('Montar treino') }}</h1>

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
                <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-dumbbled"></i> Novo</h6>
            </div>

            <div class="card-body">

            <form method="POST" action="{{ route('treinos_alunos.store', ['id' => $medidas->id]) }}" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <ul class="nav nav-tabs nav-tabs-line nav-tabs-bold nav-tabs-line-3x nav-tabs-line-brand" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#tab_informacoes" role="tab">
                            Informações
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#tab_medidas" role="tab">
                            Medidas Físicas
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#tab_treinos" role="tab">
                            Ficha de treino
                        </a>
                    </li>
                    </ul>
                    <div class="tab-content pl-lg-12">
                    <div class="tab-pane active" id="tab_informacoes" role="tabpanel"><br/>
                        <div class="row">
                        <div class="col-lg-3">
                                <div class="form-group focused">
                                    <label class="form-control-label" for="alunos_id">Nome do aluno<span class="small text-danger"> * </span></label>
                                    <select name="alunos_id" id="alunos_id" class="form-control">
                                        @foreach($alunos as $aluno)
                                            <option {{ $medidas->alunos_id == $aluno->id ? 'selected' : '' }}  value="{{ $aluno->id }}">{{$aluno->nome}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group focused">
                                    <label class="form-control-label" for="sexos_id">Sexo<span class="small text-danger"> * </span></label>
                                    <select name="sexos_id" id="sexos_id" class="form-control">
                                        @foreach($sexos as $sexo)
                                            <option {{ $medidas->sexos_id == $sexo->id ? 'selected' : '' }}  value="{{ $sexo->id }}">{{$sexo->nome}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group focused">
                                    <label class="form-control-label" for="professores_id">Professor<span class="small text-danger"> * </span></label>
                                    <select name="professores_id" id="professores_id" class="form-control">
                                        @foreach($professores as $professor)
                                            <option {{ $medidas->professores_id == $professor->id ? 'selected' : '' }}  value="{{ $professor->id }}">{{$professor->nome}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group focused">
                                    <label class="form-control-label" for="data">Data<span class="small text-danger"> * </span></label>
                                    <input type="date" id="data" class="form-control" name="data" value="{{$medidas->data}}">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group focused">
                                    <label class="form-control-label" for="data">Hora<span class="small text-danger"> * </span></label>
                                    <input type="time" id="hora" class="form-control" name="hora" value="{{$medidas->hora}}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="tab_medidas" role="tabpanel"><br/>
                    <div class="row">
                            <div class="col-lg-3">
                                <div class="form-group focused">
                                    <label class="form-control-label" for="altura">Altura<span class="small text-danger"> * </span></label>
                                    <input type="text" id="altura" class="form-control" name="altura" value="{{$medidas->altura}}">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group focused">
                                    <label class="form-control-label" for="peso">Peso<span class="small text-danger"> * </span></label>
                                    <input type="text" id="numero" class="form-control" name="peso" value="{{$medidas->peso}}">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group focused">
                                    <label class="form-control-label" for="torax">Torax<span class="small text-danger">*</span></label>
                                    <input type="text" id="torax" class="form-control" name="torax" value="{{$medidas->torax}}">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group focused">
                                    <label class="form-control-label" for="quadril">Quadril<span class="small text-danger"> * </span></label>
                                    <input type="text" id="quadril" class="form-control" name="quadril" value="{{$medidas->quadril}}">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group focused">
                                    <label class="form-control-label" for="coxa_direita">Coxa direita<span class="small text-danger"> * </span></label>
                                    <input type="text" id="coxa_direita" class="form-control" 
                                    name="coxa_direita"
                                    value="{{$medidas->coxa_direita}}">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group focused">
                                    <label class="form-control-label" for="coxa_esquerda">Coxa esquerda<span class="small text-danger">*</span></label>
                                    <input type="text" id="coxa_esquerda" class="form-control" name="coxa_esquerda" value="{{$medidas->coxa_esquerda}}">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group focused">
                                    <label class="form-control-label" for="braco_direito">Braço direito<span class="small text-danger"> * </span></label>
                                    <input type="text" id="braco_direito" class="form-control" name="braco_direito" value="{{$medidas->braco_direito}}">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group focused">
                                    <label class="form-control-label" for="braco_esquerdo">Braço esquerdo<span class="small text-danger"> * </span></label>
                                    <input type="text" id="braco_esquerdo" class="form-control" name="braco_esquerdo" value="{{$medidas->braco_esquerdo}}">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group focused">
                                    <label class="form-control-label" for="panturilha_direita">Panturilha direita<span class="small text-danger"> * </span></label>
                                    <input type="text" id="panturilha_direita" class="form-control" name="panturilha_direita" value="{{$medidas->panturilha_direita}}">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group focused">
                                    <label class="form-control-label" for="panturilha_esquerdo">Panturilha esquerda<span class="small text-danger"> * </span></label>
                                    <input type="text" id="panturilha_esquerda" class="form-control" name="panturilha_esquerda" value="{{$medidas->panturilha_esquerda}}">
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                    <br/>
                    <!-- Button -->
                    <div class="pl-lg-2">
                        <div class="row">
                            <div class="col">
                                <button type="submit" class="btn btn-outline-primary"><i class="far fa-save"></i> Salvar</button>
                                <a href="{{route('treinos_alunos')}}" class="btn btn-outline-primary"><i class="fas fa-angle-double-left"></i> voltar</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection