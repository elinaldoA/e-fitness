@extends('layouts.Recepcao.recepcao')

@section('main-content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">{{ __('Notificacoes') }}</h1>

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
                <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-bell"></i> Nova</h6>
            </div>

            <div class="card-body">

                <form method="POST" action="{{ route('notificacoes.create') }}" class="Cargos">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group focused">
                                <label class="form-control-label" for="titulo">Titulo<span class="small text-danger"> * </span></label>
                                <input type="text" id="titulo" class="form-control" name="titulo" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group focused">
                                <label class="form-control-label" for="tipo">Tipo<span class="small text-danger"> * </span></label>
                                <select id="tipo" class="form-control" name="tipo">
                                    <option>Selecione uma opção</option>
                                    <option value="Individual">Individual</option>
                                    <option value="geral">Geral</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group focused">
                                <label class="form-control-label" for="conteudo">Conteúdo<span class="small text-danger"> * </span></label>
                                <textarea id="conteudo" class="form-control" name="conteudo" cols="4" rows="4"></textarea>
                            </div>
                        </div>
                    </div>
                    <!-- Button -->
                    <div class="pl-lg-2">
                        <div class="row">
                            <div class="col">
                                <button type="submit" class="btn btn-outline-primary"><i class="far fa-paper-plane"></i> Enviar</button>
                                <a href="{{route('notificacoes')}}" class="btn btn-outline-primary"><i class="fas fa-angle-double-left"></i> Voltar</a>
                            </div>
                        </div>
                    </div>
                </form>

            </div>

        </div>

    </div>

</div>

@endsection