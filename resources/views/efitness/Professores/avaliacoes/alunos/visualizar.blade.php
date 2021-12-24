@extends('layouts.Professores.professor')

@section('main-content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">{{ __('Avaliações realiazadas') }}</h1>

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
                <h3 class="m-0 font-weight-bold text-primary"><i class="fas fa-file-medical-alt"></i></h3>
                <div class="card-body">
                    <table class="table table-hover text-center">
                        <tr>
                            <th>Aluno</th>
                            <th>Professor</th>
                            <th>Data</th>
                            <th>Hora</th>
                            <th scope="col">Status</th>
                        </tr>
                        @forelse ($medidas as $medida)
                        <tr>
                            @foreach($alunos as $aluno)
                            @if($aluno->id == $medida->alunos_id)
                            <td>{{$aluno -> nome}} </td>@endif
                            @endforeach
                            @foreach($professores as $professor)
                            @if($professor->id == $medida->professores_id)
                            <td>{{$professor -> nome}} </td>@endif
                            @endforeach
                            <td>{{ date('d-m-Y', strtotime($medida->data)) }}</td>
                            <td>{{ $medida->hora }}</td>
                            <td>
                                <a class="btn btn-outline-success" href="#"><i class="fa fa-check"></i></a>
                                <a class="btn btn-outline-warning" href="{{route('Alterar_avaliacao_medida_aluno', ['id' => $medida-> id])}}"><i class="fa fa-edit"></i></a>
                                <a class="btn btn-outline-primary" href="#"><i class="fa fa-dumbbell"></i></a>
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