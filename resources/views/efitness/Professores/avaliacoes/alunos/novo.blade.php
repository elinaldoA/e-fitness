@extends('layouts.Professores.professor')

@section('main-content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">{{ __('Realizar avaliação') }}</h1>

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
                <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-file-medical-alt"></i> Avaliação Nova</h6>
            </div>

            <div class="card-body">

            <form method="POST" action="{{ route('avaliacoes_medidas_alunos', ['id' => $avaliacoes->id]) }}" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <ul class="nav nav-tabs nav-tabs-line nav-tabs-bold nav-tabs-line-3x nav-tabs-line-brand" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#tab_informacoes" role="tab">
                            Informações
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#tab_medidas" role="tab">
                            Medidas Físicas
                        </a>
                    </li>
                    </ul>
                    <div class="tab-content pl-lg-12">
                    <div class="tab-pane active" id="tab_informacoes" role="tabpanel"><br/>
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="form-group focused">
                                    <label class="form-control-label" for="alunos">Aluno<span class="small text-danger"> * </span></label>
                                    <input class="form-control" name="alunos_id" id="alunos_id" value="{{ $avaliacoes->alunos_id}}">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group focused">
                                    <label class="form-control-label" for="professores_id">Professor<span class="small text-danger"> * </span></label>
                                    <select class="form-control" id="professores_id" name="professores_id">
                                    <option>Selecione uma opção</option>
                                        @foreach($professores as $professor)
                                        <option value="{{$professor->id}}">{{$professor->nome}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group focused">
                                    <label class="form-control-label" for="data">Data<span class="small text-danger"> * </span></label>
                                    <input type="date" id="data" class="form-control" name="data" required>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group focused">
                                    <label class="form-control-label" for="data">Hora<span class="small text-danger"> * </span></label>
                                    <input type="time" id="hora" class="form-control" name="hora" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="tab_medidas" role="tabpanel"><br/>
                    <div class="row">
                            <div class="col-lg-3">
                                <div class="form-group focused">
                                    <label class="form-control-label" for="rua">Rua<span class="small text-danger"> * </span></label>
                                    <input type="text" id="rua" class="form-control" name="rua" placeholder="Rua, Logradouro, Avenida, Travessa ..." required>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group focused">
                                    <label class="form-control-label" for="numero">Número<span class="small text-danger"> * </span></label>
                                    <input type="text" id="numero" class="form-control" name="numero" placeholder="1234" onkeyup="somenteNumeros(this);" required maxlength="4">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group focused">
                                    <label class="form-control-label" for="complemento">Complemento<span class="small text-danger">*</span></label>
                                    <input type="text" id="complemento" class="form-control" name="complemento" placeholder="Perto de..." required>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group focused">
                                    <label class="form-control-label" for="bairro">Bairro<span class="small text-danger"> * </span></label>
                                    <input type="text" id="bairro" class="form-control" name="bairro" placeholder="Bairro" required>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group focused">
                                    <label class="form-control-label" for="cep">Cep<span class="small text-danger"> * </span></label>
                                    <input type="text" id="cep" class="form-control" 
                                    name="cep" 
                                    placeholder="Somente números" 
                                    onkeypress="mascara(this,'#####-###')" maxlength="9"
                                    required>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group focused">
                                    <label class="form-control-label" for="cidade">Cidade<span class="small text-danger">*</span></label>
                                    <input type="text" id="cidade" class="form-control" name="cidade" placeholder="Sua cidade" required>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group focused">
                                    <label class="form-control-label" for="estado">Estado<span class="small text-danger"> * </span></label>
                                    <input type="text" id="estado" class="form-control" name="estado" placeholder="Es" maxlength="2" required>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group focused">
                                    <label class="form-control-label" for="pais">País<span class="small text-danger"> * </span></label>
                                    <input type="text" id="pais" class="form-control" name="pais" placeholder="Brasil" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                    <br/>
                    <!-- Button -->
                    <div class="pl-lg-2">
                        <div class="row">
                            <div class="col">
                                <button type="submit" class="btn btn-outline-primary"><i class="far fa-save"></i> Salvar</button>
                                <a href="{{route('recepcao_alunos')}}" class="btn btn-outline-primary"><i class="fas fa-angle-double-left"></i> voltar</a>
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
    function mascara(t, mask){
    var i = t.value.length;
    var saida = mask.substring(1,0);
    var texto = mask.substring(i)
    if (texto.substring(0,1) != saida){
    t.value += texto.substring(0,1);
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
