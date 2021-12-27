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
                            <a class="nav-link" data-toggle="tab" href="#tab_treinos" role="tab">
                                Ficha de treino
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content pl-lg-12">
                        <div class="tab-pane active" id="tab_informacoes" role="tabpanel"><br />
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="alunos_id">Aluno<span class="small text-danger"> * </span></label>
                                        <select name="alunos_id" id="alunos_id" class="form-control">
                                            @foreach($alunos as $aluno)
                                            <option {{ $medidas->alunos_id == $aluno->id ? 'selected' : '' }} value="{{ $aluno->id }}">{{$aluno->nome}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="professores_id">Professor<span class="small text-danger"> * </span></label>
                                        <select name="professores_id" id="professores_id" class="form-control">
                                            @foreach($professores as $professor)
                                            <option {{ $medidas->professores_id == $professor->id ? 'selected' : '' }} value="{{ $professor->id }}">{{$professor->nome}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="data_inicio">Data de inicio<span class="small text-danger"> * </span></label>
                                        <input type="date" id="data_inicio" class="form-control" name="data_inicio" required>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="data">Objetivo<span class="small text-danger"> * </span></label>
                                        <input type="text" id="objetivo" class="form-control" name="objetivo" required>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="data">Observacao<span class="small text-danger"> * </span></label>
                                        <input type="text" id="observacao" class="form-control" name="observacao" required>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="data">Aquecimento<span class="small text-danger"> * </span></label>
                                        <input type="text" id="aquecimento" class="form-control" name="aquecimento" required>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="data">Nível<span class="small text-danger"> * </span></label>
                                        <input type="text" id="nivel" class="form-control" name="nivel" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="tab_treinos" role="tabpanel"><br />
                            <a class="btn btn-outline-warning" onclick="inserirLinhaTabela()">Adcionar</a>
                            <br /><br />
                            <div class="row">
                                <table id="minhaTabela" class="table table-striped text-center">
                                    <thead>
                                        <tr>
                                            <th>Nº</th>
                                            <th>Exercícios</th>
                                            <th>Series</th>
                                            <th>Repetições</th>
                                            <th>Cargas</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><input class="form-control" name="numero" id="numero" /></td>
                                            <td><input class="form-control" name="exercicios" id="exercicios" /></td>
                                            <td><input class="form-control" name="series" id="series" /></td>
                                            <td><input class="form-control" name="repeticoes" id="repeticoes" /></td>
                                            <td><input class="form-control" name="cargas" id="cargas" /></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <br />
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
<script language="javascript">
    // Função responsável por inserir linhas na tabela
    function inserirLinhaTabela() {

        // Captura a referência da tabela com id “minhaTabela”
        var table = document.getElementById("minhaTabela");
        // Captura a quantidade de linhas já existentes na tabela
        var numOfRows = table.rows.length;
        // Captura a quantidade de colunas da última linha da tabela
        var numOfCols = table.rows[numOfRows - 1].cells.length;

        // Insere uma linha no fim da tabela.
        var newRow = table.insertRow(numOfRows);

        // Faz um loop para criar as colunas
        for (var j = 0; j < numOfCols; j++) {
            // Insere uma coluna na nova linha 
            newCell = newRow.insertCell(j);
            // Insere um conteúdo na coluna
            newCell.innerHTML = "<td><input class='form-control'/></td> ";
        }

    }
</script>