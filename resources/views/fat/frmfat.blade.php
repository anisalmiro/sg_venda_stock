@extends('adminlte::page')

@section('content_header')
	<h3> {{ $title}} </h3>
@stop

@section('content')
	@include('layouts.alerts')
	@if(isset($delete))
		<form class="form-horizontal " method="get" action="{{ route("fat.destroy", $fat->fat_id) }}" >
		{{-- <input type="hidden" id="update" value="1"> --}}
	@else
		<form class="form-horizontal " method="post" action="{{ (isset($fat)) ? route("fat.update", $fat->fat_id) : route('fat.store') }}" enctype="multipart/form-data">
		{!! csrf_field() !!}
	@endif
	@if(isset($fat))
        {!! method_field('put') !!}
        <input type="hidden" id="update" value="1">
    @else
        <input type="hidden" id="update" value="0">
	@endif
	<input type="hidden" name="fat_tipofatid" value="{{$tipofat->tipofat_id}}" >
	<div class="box box-default box-solid">
		@include('layouts.botoes2')
		<div class="box-body">
			<div class="row">
				<div class="col-md-3">
					<div class="form-group form-group-sm">
						<label for="fat_numero" class="col-md-6 control-label">N&ordm; Sequencial</label>
						<div class="col-md-6">
							<input type="text" name="fat_numero" class="form-control input-sm" readonly value="{{$numero ?? $fat->fat_numero}}" >
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group form-group-sm">
						<label for="fat_moedaid" class="col-md-3 control-label">Moeda</label>
						<div class="col-md-9">
							<select name="fat_moedaid" class="form-control input-sm" @if(isset($show)) disabled @endif >
								@foreach($moeda as $t)
								<option value="{{ $t->moeda_id }}" @if(isset($fat) && $fat->fat_moedaid == $t->moeda_id) selected @endif    >{{ $t->moeda_descricao }}</option>
								@endforeach
							</select>
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group form-group-sm">
						<label for="fat_numerointerno" class="col-md-5 control-label">Ref. Interna</label>
						<div class="col-md-7">
							<input type="text" name="fat_numerointerno" class="form-control input-sm" value="{{ $fat->fat_numerointerno ?? null}}" >
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group form-group-sm">
						<label for="fat_cambio" class="col-md-5 control-label">Câmbio</label>
						<div class="col-md-7">
							<input type="text" name="fat_cambio" class="form-control input-sm" value="{{ $fat->fat_cambio ?? null}}" >
						</div>
					</div>
				</div>
			</div>
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="panel panel-default">
						<div class="panel-body">
							<div class="col-md-6">
								<div class="form-group form-group-sm">
									<label for="fat_cliid" class="col-md-3 control-label">Nome do Cliente</label>
									<div class="col-md-9">
									<fieldset hidden></fieldset>
										@if(isset($show))

											<select name="fat_cliid" class="select2" style="width: 100%" disabled>
										@else
											<select name="fat_cliid" class="select2" style="width: 100%">
										@endif
											<option value="">Seleccione</option>
											@foreach($cli as $t)
												<option value="{{ $t->cli_id }}" @if(isset($fat) && $fat->fat_cliid == $t->cli_id) selected="true" @endif>{{ $t->cli_nome." | ".$t->cli_numero }}</option>
											@endforeach
										</select>
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group form-group-sm">
									<label for="fat_dataemissao" class="col-md-5 control-label">Data Doc.</label>
									<div class="col-md-7">
										<input type="date" name="fat_dataemissao" class="form-control input-sm" value="{{$fat->fat_dataemissao ?? date('Y-m-d')}}" @if(isset($show)) readonly @endif>
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group form-group-sm">
									<label for="fat_cambio" class="col-md-5 control-label">Data Venc.</label>
									<div class="col-md-7">
										<input type="date" name="fat_datavencimento" class="form-control input-sm" value="{{$fat->fat_datavencimento ?? date('Y-m-d', strtotime('+30 days'))}}" @if(isset($show)) readonly @endif>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<table id="fatitems" class="table table-bordered">
							<thead>
								<th style="width: 25%">Descrição</th>
								<th style="width: 10%">Quant.</th>
								<th>Preço Unit.</th>
								<th>Subtotal</th>
								<th>Desconto</th>
								<th>Valor IVA</th>
								<th style="width: 13%">Total</th>
								<th>Acção</th>
							</thead>
							<tbody>
								@if(isset($fatitem))
									@foreach($fatitem as $t)
										<tr>
											<td>
												<input type="hidden" name="fatitemid_l[]" readonly value="{{$t->fatitem_id}}" class="form-control" />
												<input type="hidden" name="stkid_l[]" readonly value="{{$t->fatitem_stkid}}" class="form-control" />
												<input type="text" name="descricao_l[]" readonly value="{{$t->fatitem_descricao}}" class="form-control" />
												<input type="hidden" name="new[]" value="false"><input type="hidden" name="update[]" value="true">
											</td>
											<td>
												<input  type="text" name="quantidade_l[]" readonly value="{{$t->fatitem_quantidade}}" class="form-control" />
											</td>
											<td>
												<input type="text" name="preco_l[]" readonly value="{{$t->fatitem_preco}}" class="form-control" />
											</td>
											<td>
												<input type="text" name="subtotal_l[]" readonly value="{{$t->fatitem_subtotal}}" class="form-control" />
												<input type="hidden" name="percentedesconto_l[]" readonly value="{{$t->fatitem_percentdesconto}}" class="form-control" />
											</td>
											<td>
												<input type="text" name="valordesconto_l[]" readonly value="{{$t->fatitem_valordesconto}}" class="form-control" />
											</td>
											<td>
												<input type="hidden" name="tabivaid_l[]" readonly value="{{$t->fatitem_tabivaid}}" class="form-control" />
												<input type="hidden" name="ivaincluido_l[]" readonly class="form-control" value="{{$t->fatitem_ivaincluido}}" />
												<input type="text" name="valoriva_l[]" readonly value="{{$t->fatitem_valoriva}}" class="form-control" />
											</td>
											<td>
												<input type="text" name="total_l[]" readonly value="{{$t->fatitem_total}}" class="form-control" />
											</td>
											<td>
												@if(!isset($show))
													<button class="btn btn-danger btn-sm" onclick="removeLinha(this)" type="button" title="Remover Linha" value="{{$t->fatitem_id}}"><i class="fa fa-trash"></i></button>
												@endif
											</td>
										</tr>
									@endforeach
								@endif
							</tbody>
						</table>
						@if(!isset($show))
							<button type="button" class="btn btn-default btn-sm" name="addLine" id="addLine" data-toggle="modal" data-target="#modal-addline" title="Adicionar Artigo/Serviço">
								<i class="fa fa-plus-circle"></i>
							</button>
						@endif
					</div>
					<div class="col-md-12" id="deleteds"></div>
					@if($tipofat->tipofat_id == 2)
						<div class="row">
							<div class="col-md-12">
								<hr>
								<div class="form-group">
									<h4>Formas de Pagamento</h4>
									<table id="formapag" class="table table-bordered">
										<thead>
											<th style="width: 22%">Tipo de Pagamento</th>
											<th style="width: 15%">Número</th>
											<th>Data</th>
											<th>Banco</th>
											<th>Local&nbsp;Tesouraria</th>
											<th style="width: 13%">Valor</th>
											<th>Acção</th>
										</thead>
										<tbody>
											@if(isset($fatitem))
												@foreach($formapag as $t)
												<tr>
													<td>
														<input type="hidden" name="formapagid_l[]" readonly value="{{$t->formapag_id}}" class="form-control" />
														<input type="text" name="tipopag_descricao_l[]" readonly value="{{$t->tipopag_descricao}}" class="form-control" />
														<input type="hidden" name="new2[]" value="false"><input type="hidden" name="update2[]" value="true">
													</td>
													<td>
														<input type="text" name="tipopag_numero_l[]" readonly value="{{$t->formapag_numero}}" class="form-control" />
													</td>
													<td>
														<input type="text" name="tipopag_data_l[]" readonly value="{{$t->formapag_data}}" class="form-control" />
													</td>
													<td>
														<input type="text" name="tipopag_banco_descricao_l[]" readonly value="{{$t->banco_descricao}}" class="form-control" />
													</td>
													<td>
														<input type="text" name="contatesoura_descricao_l[]" readonly value="{{$t->contatesoura_descricao}}" class="form-control" />
													</td>
													<td>
														<input type="text" name="tipopag_valor_l[]" readonly value="{{$t->formapag_valor}}" class="form-control" />
													</td>
													<td>
														@if(!isset($show))
															<button class="btn btn-danger btn-sm" onclick="removeLinhaFormapag(this)" type="button" title="Remover Forma de Pagamento" value="{{$t->formapag_id}}"><i class="fa fa-trash"></i></button>
														@endif
													</td>
												</tr>
												@endforeach
											@endif
										</tbody>
									</table>
									@if(!isset($show))
										<button type="button" class="btn btn-default btn-sm" id="addFormaPag" title="Adicionar Forma de Pagamanto" data-toggle="modal" data-target="#modal-formapag"">
											<i class="fa fa-plus-circle"></i>
										</button>
									@endif
								</div>
							</div>
						</div>
					@endif
					<div class="row">
						<div class="col-md-4">
							<hr />
							<div class="form-group form-group-sm">
								<label for="fat_cliid" class="col-md-5 control-label">Centro de Custo</label>
								<div class="col-md-7">
									@if(isset($show))
										<select name="fat_cencustoid" class="select2" style="width: 100%" disabled>
									@else
										<select name="fat_cencustoid" class="select2" style="width: 100%">
									@endif
										<option value="">Seleccione</option>
										@foreach($ccusto as $t)
											<option value="{{ $t->cencusto_id }}" @if(isset($fat) && $fat->fat_cencustoid == $t->cencusto_id) selected="true" @endif>{{ $t->cencusto_descricao }}</option>
										@endforeach
									</select>
								</div>
							</div>
							<div class="form-group form-group-sm">
								<label for="fat_vendid" class="col-md-5 control-label">Vendedor</label>
								<div class="col-md-7">
									@if(isset($show))
										<select name="fat_vendid" class="select2" style="width: 100%" disabled>
									@else
										<select name="fat_vendid" class="select2" style="width: 100%">
									@endif
										<option value="">Seleccione</option>
										@foreach($vend as $t)
											<option value="{{ $t->vend_id }}" @if(isset($fat) && $fat->fat_vendid == $t->vend_id) selected="true" @endif>{{ $t->vend_nome }}</option>
										@endforeach
									</select>
								</div>
							</div>
						</div>
						<div class="col-md-4"></div>
						<div class="col-md-4">
							<div class="panel panel-default">
								<div class="panel-body">
									<div class="form-group form-group-sm">
										<label for="c_subtotal" class="col-md-3 control-label">Subtotal</label>
										<div class="col-md-9">
											<input type="text"  class="form-control" readonly id="c_subtotal" name="fat_subtotal" value="{{$fat->fat_subtotal ?? 0}}">
										</div>
									</div>
									<div class="form-group form-group-sm">
										<label for="c_valordesconto" class="col-md-3 control-label">Desconto</label>
										<div class="col-md-9">
											<input type="text"  class="form-control" readonly id="c_valordesconto" name="fat_valordesconto" value="{{$fat->fat_valordesconto ?? 0}}">
										</div>
									</div>
									<div class="form-group form-group-sm">
										<label for="c_totaliva" class="col-md-3 control-label">IVA</label>
										<div class="col-md-9">
											<input type="text"  class="form-control" readonly id="c_totaliva" name="fat_totaliva" value="{{$fat->fat_totaliva ?? 0}}">
										</div>
									</div>
									<div class="form-group form-group-sm">
										<label for="c_total" class="col-md-3 control-label">Total</label>
										<div class="col-md-9">
											<input type="text"  class="form-control" readonly id="c_total" name="fat_total" value="{{$fat->fat_total ?? 0}}">
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	@include("fat.modaladdline")
	@include("fat.modalformapag")
	</form>

@stop

@section('js')
<script>
	function getPreco(){
		var stkid = $('#stk_id').val();
		var url   = "{{ route('gettabpreco', '_stkid_') }}".replace('_stkid_', stkid);
		$.getJSON(url, function (dados){
			if (dados != 1){
				$.getJSON(url, function (dados){
					$('#stk_preco').val(dados.tabpreco_preco);
					if(dados.tabpreco_ivainc == 1){
						document.getElementById("stk_ivaincluido").setAttribute("checked", "checked");
					}
				})
			}else{
				$('#stk_preco').val(0);
			}
        })
	}
	// Preenche campo hidden de descrição do artigo
	$('#stk_id').change(function(e){
		var stkid = $('#stk_id').val();
		var url   = "{{ route('getstkdetalhes', '_stkid_') }}".replace('_stkid_', stkid);
		$.getJSON(url, function (dados){
			$('#stk_descricao').val(dados.stk_descricao);
		})
		getPreco();
	});

	// Preenche campo hidden de descrição do tipo de pagamento
	$('#tipopag_id').change(function(e){
		var id = $('#tipopag_id').val();
		var url   = "{{ route('gettipopag', '_id_') }}".replace('_id_', id);
		$.getJSON(url, function (dados){
			$('#tipopag_descricao').val(dados.tipopag_descricao);
		})
	});

	// Preenche campo hidden de descrição do Banco
	$('#tipopag_bancoid').change(function(e){
		var id = $('#tipopag_bancoid').val();
		var url   = "{{ route('getbanco', '_id_') }}".replace('_id_', id);
		$.getJSON(url, function (dados){
			$('#tipopag_bancodescricao').val(dados.banco_descricao);
		})
	});

	// Preenche campo hidden de descrição da conta de tesouraria
	$('#tipopag_contatesouraid').change(function(e){
		var id = $('#tipopag_contatesouraid').val();
		var url   = "{{ route('getcontatesoura', '_id_') }}".replace('_id_', id);
		$.getJSON(url, function (dados){
			$('#tipopag_contatesouradescricao').val(dados.contatesoura_descricao);
		})
	});

	//GRID DE LINHAS DO DOCUMENTO
	(function($) {
		addLines = function() {
		var stk_id=document.getElementById('stk_id').value;
		var stk_descricao=document.getElementById('stk_descricao').value;
		var stk_quant=document.getElementById('stk_quant').value;
		var stk_preco=document.getElementById('stk_preco').value;
		var stk_subtotal=document.getElementById('stk_subtotal').value;
		var stk_percdesconto=document.getElementById('stk_percdesconto').value;
		var stk_valordesconto=document.getElementById('stk_valordesconto').value;
		var stk_tabivaid=document.getElementById('stk_tabivaid').value;
		var stk_valoriva=document.getElementById('stk_valoriva').value;
		var stk_ivaincluido= 0;
		var stk_total=document.getElementById('stk_total').value;
		if(document.getElementById('stk_ivaincluido').checked==true){
		stk_ivaincluido = 1;
		}

		var newRow = $("<tr>");
		var cols = "";
		cols += '<td><input type="hidden" name="l_stkid[]" readonly value="'+stk_id+'" class="form-control" /><input type="text" name="l_descricao[]" readonly value="'+stk_descricao+'" class="form-control" /><input type="hidden" name="new[]" value="true"><input type="hidden" name="update[]" value="false"> </td>';
		cols += '<td><input  type="text" name="l_quantidade[]" readonly value="'+stk_quant+'" class="form-control" /></td>';
		cols += '<td><input type="text" name="l_preco[]" readonly value="'+stk_preco+'" class="form-control" /></td>';
		cols += '<td><input type="text" name="l_subtotal[]" readonly value="'+stk_subtotal+'" class="form-control" /></td>';
		cols += '<input type="hidden" name="l_percentedesconto[]" readonly value="'+stk_percdesconto+'" class="form-control" />';
		cols += '<td><input type="text" name="l_valordesconto[]" readonly value="'+stk_valordesconto+'" class="form-control" /></td>';
		cols += '<input type="hidden" name="l_tabivaid[]" readonly value="'+stk_tabivaid+'" class="form-control" /><input type="hidden" name="l_ivaincluido[]" readonly class="form-control" value="'+stk_ivaincluido+'" />';
		cols += '<td><input type="text" name="l_valoriva[]" readonly value="'+stk_valoriva+'" class="form-control" /></td>';
		cols += '<td><input type="text" name="l_total[]" readonly value="'+stk_total+'" class="form-control" /></td>';
		cols += '<td>';
		cols += '<button class="btn btn-danger btn-sm" onclick="removeLinha(this)" type="button" title="Remover Linha"><i class="fa fa-trash"></i></button>';
		cols += '</td></tr>';

		newRow.append(cols);
		$("#fatitems").append(newRow);
		total();

		return false;
		}
	})(jQuery);

	(function($) {
		removeLinha = function(item) {
		var l_id = $(item).val()
		var l_ids = ''
		var tr = $(item).closest('tr')
		var deleteds = ''
		deleteds += '<input type="hidden" name="deleteds[]" readonly value="'+l_id+'" class="form-control" />';
		$("#deleteds").append(deleteds);
		tr.remove()
		total()
		return false
		}
	})(jQuery);

	//GRID DE LINHAS DO DOCUMENTO
	(function($) {
		addFormapag = function() {
		var tipopag_id=document.getElementById('tipopag_id').value;
		var tipopag_descricao=document.getElementById('tipopag_descricao').value;
		var tipopag_numero=document.getElementById('tipopag_numero').value;
		var tipopag_data=document.getElementById('tipopag_data').value;
		var tipopag_bancoid=document.getElementById('tipopag_bancoid').value;
		var tipopag_bancodescricao=document.getElementById('tipopag_bancodescricao').value;
		var tipopag_contatesouraid=document.getElementById('tipopag_contatesouraid').value;
		var tipopag_contatesouradescricao=document.getElementById('tipopag_contatesouradescricao').value;
		var tipopag_valor=document.getElementById('tipopag_valor').value;

		var newRow = $("<tr>");
		var cols = "";
		cols += '<td><input type="hidden" name="l_tipopagid[]" readonly value="'+tipopag_id+'" class="form-control" /><input type="text" name="l_tipopag_descricao[]" readonly value="'+tipopag_descricao+'" class="form-control" /><input type="hidden" name="new2[]" value="true"><input type="hidden" name="update2[]" value="false"> </td>';
		cols += '<td><input  type="text" name="l_tipopag_numero[]" readonly value="'+tipopag_numero+'" class="form-control" /></td>';
		cols += '<td><input type="text" name="l_tipopag_data[]" readonly value="'+tipopag_data+'" class="form-control" /></td>';
		cols += '<td><input type="hidden" name="l_tipopag_bancoid[]" readonly value="'+tipopag_bancoid+'" class="form-control" /><input type="text" name="l_tipopag_bancodescricao[]" readonly value="'+tipopag_bancodescricao+'" class="form-control" /></td>';
		cols += '<td><input type="hidden" name="l_tipopag_contatesouraid[]" readonly value="'+tipopag_contatesouraid+'" class="form-control" /><input type="text" name="l_tipopag_contatesouradescricao[]" readonly value="'+tipopag_contatesouradescricao+'" class="form-control" /></td>';
		cols += '<td><input type="text" name="l_tipopag_valor[]" readonly value="'+tipopag_valor+'" class="form-control" /></td>';
		cols += '<td>';
		cols += '<button class="btn btn-danger btn-sm" onclick="removeLinhaFormapag(this)" type="button" title="Remover Linha"><i class="fa fa-trash"></i></button>';
		cols += '</td></tr>';

		newRow.append(cols);
		$("#formapag").append(newRow);
		total();

		return false;
		}
	})(jQuery);

	(function($) {
		removeLinhaFormapag = function(item) {
		var l_id = $(item).val()
		var l_ids = ''
		var tr = $(item).closest('tr')
		var deleteds2 = ''
		deleteds2 += '<input type="hidden" name="deleteds2[]" readonly value="'+l_id+'" class="form-control" />';
		$("#deleteds").append(deleteds2);
		tr.remove()
		total()
		return false
		}
	})(jQuery);
</script>

@endsection
