@extends('layouts.admin')

@section('main-content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">{{ __('Mensalidades') }}</h1>

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
                <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-plus"></i> Novo Mensalidade</h6>
            </div>

            <div class="card-body">

                <form method="POST" action="{{ route('mensalidades.create') }}" class="Cargos">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="pl-lg-12">
                        <div class="col-lg-12">
                            <div class="form-group focused">
                                <label class="form-control-label" for="nome">Nome<span class="small text-danger"> * </span></label>
                                <input type="text" id="nome" class="form-control" name="nome" placeholder="Auxiliar, Recepção" required>
                            </div>
                        </div>
                    </div>
                    <!-- Button -->
                    <div class="pl-lg-2">
                        <div class="row">
                            <div class="col">
                                <button type="submit" class="btn btn-outline-primary"><i class="far fa-save"></i> Salvar</button>
                                <a href="{{route('mensalidades')}}" class="btn btn-outline-primary"><i class="fas fa-angle-double-left"></i> Voltar</a>
                            </div>
                        </div>
                    </div>
                </form>

            </div>

        </div>

    </div>

</div>

@endsection