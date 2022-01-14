@extends('layouts.admin')

@section('main-content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">{{ __('Cobranças') }}</h1>

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
                <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-plus"></i> Nova</h6>
            </div>

            <div class="card-body">

                <form method="POST" action="{{ route('cobrancas.store', ['id' => $mensalidades->id]) }}" class="Cargos">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group focused">
                                <label class="form-control-label" for="status">Aluno<span class="small text-danger"> * </span></label>
                                <select name="alunos_id" id="alunos_id" class="form-control">
                                    @foreach($alunos as $aluno)
                                        <option {{ $mensalidades->alunos_id == $aluno->id ? 'selected' : '' }} value="{{ $aluno->id }}">{{$aluno->nome}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group focused">
                                <label class="form-control-label" for="valor">Valor<span class="small text-danger"> * </span></label>
                                <select class="form-control" id="valor" name="valor">
                                    <option>Selecione uma opção</option>
                                        @foreach($mensalidades as $mensalidade)
                                        <option {{ $mensalidades->valor == $mensalidade->id ? 'selected' : '' }} value="{{ $mensalidade->id }}">{{$mensalidade->valor}}</option>
                                        @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group focused">
                                <label class="form-control-label" for="status">Status<span class="small text-danger"> * </span></label>
                                <input type="text" id="status" class="form-control" name="status">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group focused">
                                <label class="form-control-label" for="forma_de_pagamento">Forma de pagamento<span class="small text-danger"> * </span></label>
                                <input type="text" id="forma_de_pagamento" class="form-control" name="forma_de_pagamento">
                            </div>
                        </div>
                    </div>
                    <!-- Button -->
                    <div class="pl-lg-2">
                        <div class="row">
                            <div class="col">
                                <button type="submit" class="btn btn-outline-primary"><i class="far fa-save"></i> Salvar</button>
                                <a href="{{route('cobrancas')}}" class="btn btn-outline-primary"><i class="fas fa-angle-double-left"></i> Voltar</a>
                            </div>
                        </div>
                    </div>
                </form>

            </div>

        </div>

    </div>

</div>

@endsection