@extends('adminlte::page')

@section('content_header')
    <h1>Cadastrar Producto ou Serviço</h1>
@stop

@section('content')
	<div class="box">
  		@include('layouts.alerts')
    	<div class="box-header">
      		<a class="btn btn-sm btn-info" href="{{route('producto-servico')}}">
        		<i class="fa fa-step-backward"></i> Voltar
      		</a>
    	</div>
    	<div class="box-body">
    		<form

                method="POST"
                action="{{ (isset($stk->stk_id)) ? route("producto-servico.update", $stk->stk_id) : route("producto-servico.store") }}"
                enctype="multipart/form-data"
            >
                @if(isset($stk))
                    {!! method_field('put') !!}
                @endif

                {{ csrf_field() }}
                <div class="row well">
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Descrição</label>
                                    <input
                                    	class="form-control input-sm"
                                		type="text"
                                		name="stk_descricao"
                                		value="{{ $stk->stk_descricao ?? null }}"
                                		required
                            		>
                                </div>
                                <div class="form-group">
                                    <label>Referência</label>
                                    <input 
                                    	class="form-control input-sm"
                                    	type="text"
                                    	name="stk_referencia"
                                    	value="{{ $stk->stk_referencia ?? null }}"
                                    	required
                                	>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Codigo de barras</label>
                                    <input 
                                    	class="form-control input-sm"
                                    	type="text"
                                    	name="stk_codbarra"
                                    	value="{{ $stk->stk_codbarra ?? null }}"
                                    	required
                                	>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Armazém</label>
                                    <select class="form-control input-sm select2" name="stk_armazemid" required>
                                    	<option>Selecione</option>
                                    	@foreach($arm as $item)
	                                        <option
	                                        	value="{{ $item->arm_id }}"
	                                        	{{ (isset($stk) && $item->arm_id == $stk->stk_armazemid) ? "selected" : null }}
                                        	>
                                        		{{ $item->arm_descricao }}
                                        	</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>IVA</label>
                                    <select class="form-control input-sm select2" name="stk_tabivaid" required>
                                        <option>Selecione</option>
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
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Grupo</label>
                                    <select class="form-control input-sm select2" name="stk_grupoid" required>
                                        <option>Seleccione</option>
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
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Unidade de medida</label>
                                    <select class="form-control input-sm select2" name="stk_unimedid" required>
                                        <option>Selecione</option>
                                        @foreach($unimed as $item)
	                                        <option
	                                        	value="{{ $item->unimed_id }}"
	                                        	{{ (isset($stk) && $item->unimed_id == $stk->stk_unimedid) ? "selected" : null }}
                                        	>
                                        		{{ $item->unimed_descricao }}
                                        	</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Marca</label>
                                    <select class="form-control input-sm select2" name="stk_marcaid" required>
                                        <option>Selecione</option>
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
                        </div>
                        <div class="row">
                        	<div class="col-md-4">
                            	<div class="form-group">
                            		<label for="stk_usalote">Usa lote</label>
                            		<input
                                        type="checkbox"
                                        name="stk_usalote"
                                        id="stk_usalote"
                                        {{ (isset($stk->stk_usalote)) ? 'checked' : null }}
                                    >
                            	</div> 
                            </div>
                        	<div class="col-md-4">
                            	<div class="form-group">
                            		<label for="stk_usadesctecnica">Usa descrição técnica</label>
                            		<input
                                        type="checkbox"
                                        name="stk_usadesctecnica"
                                        id="stk_usadesctecnica"
                                        {{ (isset($stk->stk_usadesctecnica)) ? 'checked' : '' }}
                                    >
                            	</div> 
                            </div>
                            <div class="col-md-4">
                            	<div class="form-group">
                            		<label for="stk_pos">POS</label>
                            		<input 
                                        type="checkbox"
                                        name="stk_pos"
                                        id="stk_pos"
                                        {{ (isset($stk->stk_pos)) ? 'checked' : '' }}
                                    >
                            	</div> 
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Descrição técnica</label>
                                    <textarea name="stk_desctecnica" class="form-control input-sm">{{ $stk->stk_desctecnica ?? null }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Descrição POS</label>
                                    <textarea name="stk_descricaopos" class="form-control input-sm">{{ $stk->stk_descricaopos ?? null }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                    	<div class="row">
                    		<div class="col-md-6">
                    			<div class="form-group">
			                        <label>Referência a fornecedor</label>
			                        <input 
                                        class="form-control input-sm"
                                        type="text"
                                        name="stk_reffornecedor"
                                        value="{{ $stk->stk_reffornecedor ?? null }}"
                                        required
                                    >
			                    </div>
                    		</div>
                    		<div class="col-md-6">
                    			<div class="form-group">
			                        <label>Ponto de encomenda</label>
			                        <input 
                                        class="form-control input-sm"
                                        type="number"
                                        name="stk_pontoencomenda"
                                        value="{{ $stk->stk_pontoencomenda ?? null }}"
                                        required
                                    >
			                    </div>
                    		</div>
                    	</div>
                    	<div class="row">
                    		<div class="col-md-6">
                    			<div class="form-group">
			                        <label>Quantidade em reserva</label>
			                        <input
			                        	class="form-control input-sm"
			                        	type="number"
			                        	name="stk_quantreserva"
			                        	value="{{ $stk->stk_pontoencomenda ?? null }}"
			                        	required
		                        	>
			                    </div>
                    		</div>
                    		<div class="col-md-6">
                    			<div class="form-group">
			                        <label>Previsto</label>
			                        <input
			                        	class="form-control input-sm"
			                        	type="number"
			                        	name="stk_previsto"
			                        	value="{{ $stk->stk_previsto ?? null }}"
			                        	required
		                        	>
			                    </div>
                    		</div>
                    	</div>
                    	<div class="row">
                    		<div class="col-md-12">
                    			<div class="form-group">
			                        <label>Imagem</label>
			                        <input class="form-control input-sm" type="file" name="stk_imagem" accept=".png,.gif,.jpg,.jpeg,.ico">
			                    </div>
                    		</div>
                    	</div>
                    	<div class="row">
                    		<div class="col-md-4">
                    			<div class="form-group">
			                        <label>Servico</label>
			                        <input
			                        	type="checkbox"
			                        	name="stk_servico"
			                        	{{ (isset($stk->stk_servico)) ? 'checked' : null }}
		                        	>
			                    </div>
                    		</div>
                    		<div class="col-md-4">
                    			<div class="form-group">
			                        <label>Movimenta negativo</label>
			                        <input
			                        	type="checkbox"
			                        	name="stk_negativo"
			                        	{{ (isset($stk->stk_negativo)) ? 'checked' : null }}
		                        	>
			                    </div>
                    		</div>
                    		<div class="col-md-4">
                    			<div class="form-group">
			                        <label>Avisa negativo</label>
			                        <input
			                        	type="checkbox"
			                        	name="stk_avisanegativo"
			                        	{{ (isset($stk->stk_avisanegativo)) ? 'checked' : null }}
		                        	>
			                    </div>
                    		</div>
                    	</div>
                    	<div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Observação</label>
                                    <textarea name="stk_observacao" class="form-control input-sm">{{ $stk->stk_observacao ?? null }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    			<div class="box-footer">
    				<div class="col-md-6">
    					<button type="submit" class="btn btn-primary">
    						@if(isset($stk))
    							<i class="fa fa-save"></i> Actualizar
    						@else
    							<i class="fa fa-save"></i> Gravar
    						@endif
    					</button>
    				</div>
    			</div>
    		</form>
    	</div>
	</div>
@stop


@section('adminlte_js')
	<script type="text/javascript">

		$(window).on("load", function() {
			/* Hide textarea of stk_desctecnica if stk_usadesctecnica is not checked */
			if(!$("input[name=stk_usadesctecnica]").is(":checked")) {
				$("textarea[name=stk_desctecnica]").parent("div").parent("div").parent("div").hide();
			}
			/* Hide textarea of stk_descricaopos if stk_pos is not checked */
			if(!$("input[name=stk_pos]").is(":checked")) {
				$("textarea[name=stk_descricaopos]").parent("div").parent("div").parent("div").hide();
			}
		});

		$(document).on("change", "input[name=stk_usadesctecnica]", function(event) {
			/* Hide or show textarea of stk_desctecnica if stk_usadesctecnica is checked */
			if($(this).is(":checked")) {
				$("textarea[name=stk_desctecnica]").parent("div").parent("div").parent("div").show("fast");
			} else {
				$("textarea[name=stk_desctecnica]").parent("div").parent("div").parent("div").hide("fast");
			}
		});
		$(document).on("change", "input[name=stk_pos]", function(event) {
			/* Hide or show textarea of stk_descricaopos if stk_pos is checked */
			if($(this).is(":checked")) {
				$("textarea[name=stk_descricaopos]").parent("div").parent("div").parent("div").show("fast");
			} else {
				$("textarea[name=stk_descricaopos]").parent("div").parent("div").parent("div").hide("fast");
			}
		});
	</script>
@stop