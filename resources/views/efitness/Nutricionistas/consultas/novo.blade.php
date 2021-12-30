@extends('layouts.Nutricionistas.nutricionista')

@section('main-content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">{{ __('Realizar consulta') }}</h1>

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
                <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-user-medical"></i> Nova</h6>
            </div>

            <div class="card-body">

                <form method="POST" action="{{ route('consultas_nutri.store', ['id' => $consultas_nutricionais->id], ['id' => $medidas->id]) }}" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <ul class="nav nav-tabs nav-tabs-line nav-tabs-bold nav-tabs-line-3x nav-tabs-line-brand" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tab_informacoes" role="tab">
                                Informações
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tab_medidas" role="tab">
                                Medidas Antropométricas
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tab_anamnese" role="tab">
                                Anamnese Corporal
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content pl-lg-12">
                        <div class="tab-pane active" id="tab_informacoes" role="tabpanel"><br />
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="alunos_id">Paciente<span class="small text-danger"> * </span></label>
                                        <select name="alunos_id" id="alunos_id" class="form-control">
                                            @foreach($alunos as $aluno)
                                            <option {{ $consultas_nutricionais->alunos_id == $aluno->id ? 'selected' : '' }} value="{{ $aluno->id }}">{{$aluno->nome}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="nutricionistas_id">Nutricionista<span class="small text-danger"> * </span></label>
                                        <select name="nutricionistas_id" id="nutricionistas_id" class="form-control">
                                            @foreach($nutricionistas as $nutricionista)
                                            <option {{ $consultas_nutricionais->nutricionistas_id == $nutricionista->id ? 'selected' : '' }} value="{{ $nutricionista->id }}">{{$nutricionista->nome}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="data">Data da consulta<span class="small text-danger"> * </span></label>
                                        <input type="date" id="data" class="form-control" name="data" value="{{$consultas_nutricionais->data}}">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="data">Hora da consulta<span class="small text-danger"> * </span></label>
                                        <input type="time" id="hora" class="form-control" name="hora" value="{{$consultas_nutricionais->hora}}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="tab_medidas" role="tabpanel"><br />
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="altura">Altura<span class="small text-danger"> * </span></label>
                                        <input type="text" id="altura" class="form-control" name="altura" placeholder="1.69" value="{{$medidas->altura}}">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="peso">Peso<span class="small text-danger"> * </span></label>
                                        <input type="text" id="numero" class="form-control" name="peso" placeholder="80.0" value="{{$medidas->peso}}">
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
                                        <input type="text" id="coxa_direita" class="form-control" name="coxa_direita" value="{{$medidas->coxa_direita}}">
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
                        <div class="tab-pane" id="tab_anamnese" role="tabpanel"><br />
                            <div class="row">
                                <div class="col-lg-1">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="status">Status <span class="small text-danger"> * </span></label>
                                        <input type="checkbox" id="status" name="status" class="form-control" value="1" @if(old('status')) checked="checked" @endif required>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="alunos_id">Paciente<span class="small text-danger"> * </span></label>
                                        <select name="alunos_id" id="alunos_id" class="form-control">
                                            @foreach($alunos as $aluno)
                                            <option {{ $consultas_nutricionais->alunos_id == $aluno->id ? 'selected' : '' }} value="{{ $aluno->id }}">{{$aluno->nome}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="motivo">Motivo da consulta<span class="small text-danger"> * </span></label>
                                        <input type="text" class="form-control" name="motivo" id="motivo" placeholder="Perca de peso..." required>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="doenca">Possui alguma doença ? <span class="small text-danger"> * </span></label>
                                        <input type="text" id="doenca" class="form-control" name="doenca" placeholder="Diabetes ..." required>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="doenca_familiar">Possui alguma doença na familia ? <span class="small text-danger">*</span></label>
                                        <input type="text" id="doenca_familiar" class="form-control" name="doenca_familiar" placeholder="Hipertensão">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="quadril">Usa algum medicamento ? <span class="small text-danger"> * </span></label>
                                        <select class="form-control" name="medicamentos" id="medicamentos">
                                            <option>Selecione uma opção</option>
                                            <option value="sim">Sim</option>
                                            <option value="nao">Não</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="historico_social">Histórico social<span class="small text-danger"> * </span></label>
                                        <input type="text" class="form-control" name="historico_social" id="historico_social" placeholder="Tabagismo ..." required>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="atividade_fisica">Atividade física<span class="small text-danger">*</span></label>
                                        <input type="text" class="form-control" name="atividade_fisica" id="atividade_fisica" placeholder="Musculação ..." required>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="motivo_pratica">Motivo da prática de atividade<span class="small text-danger"> * </span></label>
                                        <input type="text" class="form-control" name="motivo_pratica" id="motivo_pratica" placeholder="Saúde ..." required>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="tempo_pratica">Tempo da prática<span class="small text-danger"> * </span></label>
                                        <input type="text" class="form-control" name="tempo_pratica" id="tempo_pratica" placeholder=" 6 meses ..." required>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="suplementos">Faz uso de suplementos ?<span class="small text-danger"> * </span></label>
                                        <input type="text" class="form-control" name="suplementos" id="suplementos" placeholder="BCAA..." required>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="refeicoes">Refeições por dia<span class="small text-danger"> * </span></label>
                                        <input type="text" id="refeicoes" class="form-control" name="refeicoes" placeholder="1,2 ..." required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="alimentos">Alimentos inseridos diariamente<span class="small text-danger"> * </span></label>
                                        <textarea class="form-control" cols="4" rows="4" name="alimentos" id="alimentos"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="observacoes">Observações<span class="small text-danger"> * </span></label>
                                        <textarea class="form-control" cols="4" rows="4" name="observacoes" id="observacoes"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="agua">Qt. de água ingeridas diariamente<span class="small text-danger"> * </span></label>
                                        <input type="text" class="form-control" name="agua" id="agua" placeholder="1 copo, 2 copos ..." required>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="agua">Diagnóstico<span class="small text-danger"> * </span></label>
                                        <input type="text" class="form-control" name="diagnostico" id="diagnostico" required>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="agua">Conduta e característica da dieta<span class="small text-danger"> * </span></label>
                                        <input type="text" class="form-control" name="conduta_dieta" id="conduta_dieta" required>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="agua">Data de revisão<span class="small text-danger"> * </span></label>
                                        <input type="date" class="form-control" name="data_revisao" id="data_revisao" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br />
                    <!-- Button -->
                    <div class="pl-lg-2">
                        <div class="row">
                            <div class="col">
                                <button type="submit" class="btn btn-outline-primary"><i class="far fa-save"></i> Salvar</button>
                                <a href="{{route('consultas_nutri')}}" class="btn btn-outline-primary"><i class="fas fa-angle-double-left"></i> voltar</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
<!---Mascaras para campos especificos--->
<script language="JavaScript">
    function mascara(t, mask) {
        var i = t.value.length;
        var saida = mask.substring(1, 0);
        var texto = mask.substring(i)
        if (texto.substring(0, 1) != saida) {
            t.value += texto.substring(0, 1);
        }
    }
</script>
<script language="JavaScript">
    function somenteNumeros(num) {
        var er = /[^0-9.^/^-]/;
        er.lastIndex = 0;
        var campo = num;
        if (er.test(campo.value)) {
            campo.value = "";
        }
    }
</script>