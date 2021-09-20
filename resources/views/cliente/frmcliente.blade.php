@extends('adminlte::page')
@section('content_header')
<h1>{{ $title}}</h1>
@stop
@section('content')
  <div class="box">
	@include('layouts.alerts')
	<div class="box-header">
		<a class="btn btn-sm btn-info" href="{{route('clientes')}}">
			<i class="fa fa-step-backward"></i> Voltar
		</a>
	</div>
	<div class="box-body">
		@if(isset($cl))
		<form method="post" action="{{route('cliente.update',$cl->cli_id)}}" enctype="multipart/form-data">
			{!! method_field('put') !!}
			@else
			<form method="post" action="{{route('cliente.store')}}" enctype="multipart/form-data">
				@endif
				{!! csrf_field() !!}
				<div class="box-body">
					<div class="row well">
						<div class="col-md-6">
							<div class="row">
								<div class="col-md-3">
									<div class="form-group">
										<label>Número</label>
										<input type="text" name="cli_numero" class="form-control input-sm" value="{{$cl->cli_numero ?? $numero}}" readonly>
									</div>
								</div>
								<div class="col-md-9">
									<div class="form-group">
										<label for="nome">Nome</label>
										<input type="text" name="cli_nome" class="form-control input-sm" value="{{$cl->cli_nome ?? null}}" required>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label for="cli_nomecomercial">Nome Comercial</label>
										<input type="text" name="cli_nomecomercial" class="form-control input-sm" value="{{$cl->cli_nomecomercial ?? null}}" >
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label for="nome">Morada</label>
										<input type="text" name="cli_morada" class="form-control input-sm" value="{{$cl->cli_morada ?? null}}" >
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label for="nome">Telefone</label>
										<input type="text" name="cli_telefone" class="form-control input-sm" value="{{$cl->cli_telefone ?? null}}">
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="nome">Celular</label>
										<input type="text" name="cli_celular" class="form-control input-sm" value="{{$cl->cli_celular ?? null}}">
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="nome">Fax</label>
										<input type="text" name="cli_fax" class="form-control input-sm" value="{{$cl->cli_fax ?? null}}">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-8">
									<div class="form-group">
										<label for="nome">E-mail</label>
										<input type="email" name="cli_email" class="form-control input-sm" value="{{$cl->cli_email ?? null}}">
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="nome">NUIT</label>
										<input type="text" name="cli_nuit" class="form-control input-sm" value="{{$cl->cli_nuit ?? null}}">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label for="cli_paisid">País</label>
										<select name="cli_paisid" class="select2" style="width: 100%;">
											<option value="">Seleccione</option>
											@foreach($pais as $t)
											<option value="{{ $t->pais_id }}" @if(isset($cl) && $cl->cli_paisid == $t->pais_id) selected @endif>{{ $t->pais_descricao }}</option>
											@endforeach
										</select>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="cli_cencustoid">Centro de Custo</label>
										<select name="cli_cencustoid" class="select2" style="width: 100%;">
											<option value="">Seleccione</option>
											@foreach($ccusto as $t)
											<option value="{{ $t->cencusto_id }}" @if(isset($cl) && $cl->cli_cencustoid == $t->cencusto_id) selected @endif>{{ $t->cencusto_descricao }}</option>
											@endforeach
										</select>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="cli_armazemid">Armazém Predef.</label>
										<select name="cli_armazemid" class="select2" style="width: 100%;">
											<option value="">Seleccione</option>
											@foreach($arm as $t)
											<option value="{{ $t->arm_id }}" @if(isset($cl) && $cl->cli_armazemid == $t->arm_id) selected @endif>{{ $t->arm_descricao }}</option>
											@endforeach
										</select>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="cli_estado">Estado</label>
										<select name="cli_estado" class="select2" style="width: 100%;">
											<option value="1" @if(isset($cl) && $cl->cli_estado == 1) selected @endif>Activo</option>
											<option value="0" @if(isset($cl) && $cl->cli_estado == 0) selected @endif>Inactivo</option>
										</select>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="cli_vendid">Vendedor</label>
										<select name="cli_vendid" class="select2" style="width: 100%;">
											<option value="">Seleccione</option>
											@foreach($vend as $t)
											<option value="{{ $t->vend_id }}" @if(isset($cl) && $cl->cli_vendid == $t->vend_id) selected @endif>{{ $t->vend_nome }}</option>
											@endforeach
										</select>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="cli_tipocliid">Tipo de Cliente</label>
										<select name="cli_tipocliid" class="select2" style="width: 100%;">
											<option value="">Seleccione</option>
											@foreach($tipocli as $t)
											<option value="{{ $t->tipocli_id }}" @if(isset($cl) && $cl->cli_tipocliid == $t->tipocli_id) selected @endif>{{ $t->tipocli_descricao }}</option>
											@endforeach
										</select>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="cli_tipodesconto">Tipo de Desconto</label>
										<select name="cli_tipodesconto" class="select2" style="width: 100%;">
											<option value="">Seleccione</option>
											<option value="1" @if(isset($cl) && $cl->cli_tipodesconto == 1) selected @endif>Percentagem</option>
											<option value="2" @if(isset($cl) && $cl->cli_tipodesconto == 2) selected @endif>Valor</option>
										</select>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label for="cli_desconto">Desconto</label>
										<input type="text" name="cli_desconto" class="form-control" value="{{$cl->cli_desconto ?? null}}">
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="cli_valmin">Valor Mínimo</label>
										<input type="text" name="cli_valmin" class="form-control" value="{{$cl->cli_valmin ?? null}}">
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="cli_valmax">Valor Máximo</label>
										<input type="text" name="cli_valmax" class="form-control" value="{{$cl->cli_valmax ?? null}}">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label for="cli_moedaid">Moeda</label>
										<select name="cli_moedaid" class="select2" style="width: 100%;">
											<option value="">Seleccione</option>
											@foreach($moeda as $t)
											<option value="{{ $t->moeda_id }}" @if(isset($cl) && $cl->cli_moedaid == $t->moeda_id) selected @endif>{{ $t->moeda_sigla }}</option>
											@endforeach
										</select>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="cli_codtabpreco">Tabela de Preço</label>
										<input type="number" name="cli_codtabpreco" class="form-control" value="{{ $cl->cli_codtabpreco ?? null}}">
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="cli_condpagid">Cond. de Pag.</label>
										<select name="cli_condpagid" class="select2" style="width: 100%;">
											<option value="">Seleccione</option>
											@foreach($condpag as $t)
											<option value="{{ $t->condpag_id }}" @if(isset($cl) && $cl->cli_condpagid == $t->condpag_id) selected @endif>{{ $t->condpag_descricao }}</option>
											@endforeach
										</select>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<div class="checkbox">
											<label>
												<input type="checkbox" name="cli_prontopag" @if(isset($cl) && $cl->cli_prontopag == 1) checked @endif>
												<strong>Pronto Pag.</strong>
											</label>
										</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<div class="checkbox">
											<label>
												<input type="checkbox" name="cli_ivaincluido" @if(isset($cl) && $cl->cli_ivaincluido == 1) checked @endif>
												<strong>IVA Incluído</strong>
											</label>
										</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<div class="checkbox">
											<label>
												<input type="checkbox" name="cli_ivaisento" @if(isset($cl) && $cl->cli_ivaisento == 1) checked @endif>
												<strong>IVA Isento</strong>
											</label>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="box-footer">
					<div class="col-md-6">
						@if(isset($del))
						<a href="{{ route("cliente.destroy", $cl->cli_id) }}" class="btn btn-danger"><i class="fa fa-trash"></i> Apagar</a>
						@elseif(!isset($show))
						<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Gravar</button>
						@endif
					</div>
				</div>
			</form>
		</div>
	  </div>
	@stop
	@section('adminlte_js')
	@stop
