@extends('layouts.Professores.professor')

@section('main-content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">{{ __('Avaliações') }}</h1>

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
                <a class="btn btn-outline-success pull-left" href="#"><i class="fas fa-plus"></i> Adcionar</a>
                <div class="card-body">
                    <table class="table table-hover text-center">
                        <tr>
                            <th>Aluno</th>
                            <th>Professor</th>
                            <th>Data</th>
                            <th>Hora</th>
                            <th scope="col">Ações</th>
                        </tr>
                        @forelse ($avaliacoes as $avaliacao)
                        <tr>
                            @foreach($alunos as $aluno)
                            @if($aluno->id == $avaliacao->alunos_id)
                            <td>{{$aluno -> nome}} </td>@endif
                            @endforeach
                            @foreach($professores as $professor)
                            @if($professor->id == $avaliacao->professores_id)
                            <td>{{$professor -> nome}} </td>@endif
                            @endforeach
                            <td>{{ date('d-m-Y', strtotime($avaliacao->data)) }}</td>
                            <td>{{ $avaliacao->hora }}</td>
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
                    <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">{{ __('Confirmar exclusão') }}</h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    Deseja realmente excluir esse registro ?
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-link" type="button" data-dismiss="modal">{{ __('Cancelar') }}</button>
                                    <a class="btn btn-danger btn-ok" href="#">Delete</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <nav aria-label="Navegação de página exemplo">
                        <ul class="pagination justify-content-center">
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Anterior">
                                    <span aria-hidden="true">&laquo;</span>
                                    <span class="sr-only">Anterior</span>
                                </a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Próximo">
                                    <span aria-hidden="true">&raquo;</span>
                                    <span class="sr-only">Próximo</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection