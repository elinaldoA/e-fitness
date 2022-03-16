@extends('layouts.Recepcao.recepcao')

@section('main-content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">{{ __('Consultas') }}</h1>

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
                <h6 class="m-0 font-weight-bold text-primary">Editar</h6>
            </div>

            <div class="card-body">

                <form method="POST" action="{{ route('Alterar_consulta_aluno', ['id' => $consultas_nutricionais->id]) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="form-group focused">
                                <label class="form-control-label" for="alunos_id">Aluno<span class="small text-danger"> * </span></label>
                                <select name="alunos_id" id="alunos_id" class="form-control">
                                    @foreach($alunos as $aluno)
                                    <option {{ $consultas_nutricionais->alunos_id == $aluno->id ? 'selected' : '' }} value="{{ $aluno->id }}">{{$aluno->nome}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group focused">
                                <label class="form-control-label" for="professores_id">Avaliador Fisíco<span class="small text-danger"> * </span></label>
                                <select name="professores_id" id="professores_id" class="form-control">
                                    @foreach($nutricionistas as $nutricionista)
                                    <option {{ $consultas_nutricionais->nutricionistas_id == $nutricionista->id ? 'selected' : '' }} value="{{ $nutricionista->id }}">{{$nutricionista->nome}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group focused">
                                <label class="form-control-label" for="email">E-mail<span class="small text-danger"> * </span></label>
                                <input type="email" class="form-control" name="email" id="email" value="{{$consultas_nutricionais->email}}" />
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group focused">
                                <label class="form-control-label" for="data">Contato<span class="small text-danger"> * </span></label>
                                <input type="text" class="form-control" name="telefone" id="telefone" value="{{$consultas_nutricionais->telefone}}" />
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group focused">
                                <label class="form-control-label" for="data">Data<span class="small text-danger"> * </span></label>
                                <input type="date" class="form-control" name="data" id="data" value="{{$consultas_nutricionais->data}}" />
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group focused">
                                <label class="form-control-label" for="hora">Horário<span class="small text-danger"> * </span></label>
                                <input type="time" class="form-control" name="hora" id="hora" value="{{$consultas_nutricionais->hora}}" />
                            </div>
                        </div>
                    </div>
                    <!-- Button -->
                    <div class="pl-lg-2">
                        <div class="row">
                            <div class="col">
                                <button type="submit" class="btn btn-outline-primary"><i class="fas fa-edit"></i>Atualizar</button>
                            </div>
                        </div>
                    </div>
                </form>

            </div>

        </div>

    </div>

</div>

@endsection