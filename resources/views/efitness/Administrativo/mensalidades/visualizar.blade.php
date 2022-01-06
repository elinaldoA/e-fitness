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
                <h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-cash-register"></i> Pendentes</h6>
                <div class="card-body">

                    <table class="table table-hover text-center">
                        <tr>
                            <th scope="col">Alunos</th>
                            <th scope="col">Planos</th>
                            <th scope="col">Valor</th>
                            <th scope="col">Pagamento</th>
                            <th scope="col">Status</th>
                            <th scope="col">Vencimento</th>
                            <th scope="col">Ações</th>
                        </tr>
                        @forelse ($mensalidades as $mensalidade)
                        <tr>
                            <td>{{ $mensalidade -> alunos_id }}</td>
                            @foreach($planos as $plano)
                            @if($plano->id == $mensalidade->planos_id)
                            <td>{{$plano -> nome}} </td>@endif
                            @endforeach
                            <td>R$ {{ number_format($mensalidade -> valor, 2) }}</td>
                            @foreach($pagamentos as $pagamento)
                            @if($pagamento->id == $mensalidade->formas_de_pagamentos_id)
                            <td>{{$pagamento -> forma_de_pagamento}} </td>@endif
                            @endforeach
                            @foreach($pagamentos as $pagamento)
                            @if($pagamento->id == $mensalidade->status_id)
                            <td>{{$pagamento -> status}} </td>@endif
                            @endforeach
                            <td>{{ $mensalidade -> vencimento }}</td>
                            <td>
                                <a class="btn btn-outline-primary" href="#"><i class="fa fa-file-invoice-dollar"></i></a>
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
                        </tbody>
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
                                    <a class="btn btn-danger btn-ok" href="{{ route('excluir_mensalidade', ['id' => $mensalidade-> id]) }}">Delete</a>
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