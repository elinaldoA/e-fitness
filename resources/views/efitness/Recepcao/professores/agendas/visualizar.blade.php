@extends('layouts.Recepcao.recepcao')

@section('main-content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">{{ __('Agendamentos') }}</h1>

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
                <a class="btn btn-outline-success pull-left" href="novo"><i class="fas fa-plus"></i> Adcionar</a>
                <div class="card-body">
                    <table class="table table-hover text-center">
                        <tr>
                            <th>Titulo</th>
                            <th>Inicio</th>
                            <th>Fim</th>
                            <th scope="col">Ações</th>
                        </tr>
                        @forelse ($agendasProfessores as $agendasProfessor)
                        <tr>
                            <td>{{ $agendasProfessor -> titulo }}</td>
                            <td>{{ $agendasProfessor -> inicio }}</td>
                            <td>{{ $agendasProfessor -> fim }}</td>
                            <td>
                                <a class="btn btn-outline-primary" href="#"><i class="fa fa-edit"></i></a>
                                <a class="btn btn-outline-danger" data-toggle="modal" data-target="#confirm-delete"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6">
                                <h4>Nenhum registro encontrado para listar</h4>
                            </td>
                        </tr>
                        @endforelse
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection