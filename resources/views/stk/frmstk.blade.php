@extends('adminlte::page')

@section('content_header')
<h3>{{ $title }}</h3>
@stop

@section('content')
    @include('layouts.alerts')
    @if(isset($delete))
        <form class="form-horizontal " method="get" action="{{ route("stk.destroy", $stk->stk_id) }}" >
        <input type="hidden" id="update" value="1">
    @else
        <form class="form-horizontal " method="post" action="{{ (isset($stk)) ? route("stk.update", $stk->stk_id) : route('stk.store') }}" enctype="multipart/form-data">
        {!! csrf_field() !!}
    @endif
        @if(isset($stk))
            {!! method_field('put') !!}
            <input type="hidden" id="update" value="1">
        @else
            <input type="hidden" id="update" value="0">
        @endif
        <div class="box box-default box-solid">
            @include('layouts.botoes')
            <div class="box-body">
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group form-group-sm">
                            <label for="stk_referencia" class="col-md-4 control-label">Referência</label>
                            <div class="col-md-8">
                            <input type="text" class="form-control" id="stk_referencia" name="stk_referencia" placeholder="Referência" value="{{ $stk->stk_referencia ?? null}}">
                            </div>
                        </div>
                    </div>   
                    <div class="col-md-6">
                        <div class="form-group form-group-sm">
                            <label for="descricao" class="col-md-2 control-label">Descrição</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" id="stk_descricao" name="stk_descricao" placeholder="Descrição do Artigo/Serviço" value="{{ $stk->stk_descricao ?? null}}">
                            </div>
                        </div>
                    </div> 
                    <div class="col-md-3">
                        <div class="form-group form-group-sm">
                            <label for="stk_servico" class="col-md-6 control-label">É um Serviço?</label>
                            <div class="col-md-6">
                                <input type="checkbox" name="stk_servico"  @if(isset($stk)) {{ $stk->stk_servico==1 ? 'checked' : null }} @endif  >
                            </div>
                        </div>
                    </div>
                </div>   
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="col-md-6 panel panel-default">
                            <div class="panel-body">
                                <div class="form-group form-group-sm">
                                    <label for="stk_codbarra" class="col-md-3 control-label">Código Barras</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" id="stk_codbarra" name="stk_codbarra" placeholder="Código de Barras" value="{{ $stk->stk_codbarra ?? null}}">
                                    </div>
                                </div>  
                                <div class="form-group form-group-sm">
                                    <label for="descricao" class="col-md-3 control-label">Unid. Medida</label>
                                    <div class="col-md-9">
                                        <select class="select2" style="width: 100%" name="stk_unimedid">
                                    	<option value="">Selecione</option>
                                    	@foreach($unimed as $item)
	                                        <option
	                                        	value="{{ $item->unimed_id }}"
	                                        	{{ (isset($stk) && $item->unimed_id == $stk->stk_unimedid) ? "selected" : null }}
                                        	>
                                        		{{ $item->unimed_sigla.' | '.$item->unimed_descricao }}
                                        	</option>
                                        @endforeach
                                    </select>
                                    </div>
                                </div>
                                <div class="form-group form-group-sm">
                                    <label for="stk_grupoid" class="col-md-3 control-label">Grupo</label>
                                    <div class="col-md-9">
                                        <select class="select2" style="width: 100%" name="stk_grupoid">
                                            <option value="">Seleccione</option>
                                            @foreach($grupo as $item)
                                                <option
                                                    value="{{ $item->grupo_id }}"
                                                    {{ (isset($stk) && $item->grupo_id == $stk->stk_grupoid) ? "selected" : null }}
                                                >
                                                    {{ $item->grupo_descricao }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group form-group-sm">
                                    <label for="stk_marcaid" class="col-md-3 control-label">Marca</label>
                                    <div class="col-md-9">
                                        <select class="select2" style="width: 100%" name="stk_marcaid">
                                            <option value="">Selecione</option>
                                            @foreach($marca as $item)
                                                <option
                                                    value="{{ $item->marca_id }}"
                                                    {{ (isset($stk) && $item->marca_id == $stk->stk_marcaid) ? "selected" : null }}
                                                >
                                                    {{ $item->marca_descricao }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group form-group-sm">
                                    <label for="stk_reffornecedor" class="col-md-3 control-label">Ref. Fornecedor</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" id="stk_reffornecedor" name="stk_reffornecedor" placeholder="Referência de Fornecedor" value="{{ $stk->stk_reffornecedor ?? null}}">
                                    </div>
                                </div>
                            </div> 
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-sm">
                                <label for="stk_tabivaid" class="col-md-3 control-label">Tabela de IVA</label>
                                <div class="col-md-9">
                                    <select class="select2" style="width: 100%" name="stk_tabivaid">
                                        @foreach($tabiva as $item)
	                                        <option 
	                                        	value="{{ $item->tabiva_id }}"
	                                        	{{ (isset($stk) && $item->tabiva_id == $stk->stk_tabivaid) ? "selected" : null }}
                                        	>
                                        		{{ $item->tabiva_descricao }}
                                    		</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div> 
                            <table id="tabprecos" class="table table-bordered">
                                <caption><strong>Tabela de Preços</strong></caption>
                                <thead>
                                    <th>N&ordm;</th>
                                    <th>Preço</th>
                                    <th>IVA Incluído</th>
                                </thead>
                                <tbody>
                                    @if(isset($tabpreco))
                                        @foreach($tabpreco as $t)
                                            <tr>
                                                <td>
                                                    <input type="hidden" name="tabpreco_id[]" value="{{$t->tabpreco_id}}" />
                                                    <input type="text" name="tabpreco_codigol[]"  class="form-control form-control-sm" value="{{$t->tabpreco_codigo}}" readonly />
                                                </td>
                                                <td>
                                                    <input type="text" name="tabpreco_precol[]" class="form-control form-control-sm" value="{{$t->tabpreco_preco}}" />
                                                </td>
                                                <td>
                                                    <input type="checkbox" name="tabpreco_ivaincl[]" {{ $t->tabpreco_ivainc==1 ? 'checked' : null }} />
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                            <button type="button" class="btn btn-default btn-sm" onClick="addLines();" title="Adicionar Preço">
                                <i class="fa fa-plus-circle"></i>
                            </button>
                        </div>
                    </div>
                </div>         
            </div>
        </div>
    </form>    
@stop

@section('js')

<script>
    var count = {{ isset($tabpreco)==true ? count($tabpreco) : 0 }};
    
    //GRID DE Tabela de Preços
    (function($) {
        addLines = function() {
            count = count+1;
        var newRow = $("<tr>");
        var cols = "";
        cols += '<td><input type="text" name="tabpreco_codigo[]" class="form-control form-control-sm" value="'+count+'" readonly /></td>';
        cols += '<td><input type="text" name="tabpreco_preco[]" class="form-control form-control-sm" /></td>';
        cols += '<td><input type="checkbox" name="tabpreco_ivainc[]" /></td>';
        cols += '</tr>';

        newRow.append(cols);
        $("#tabprecos").append(newRow);

        return false;
        }
    })(jQuery); 
</script>

@endsection