@extends('adminlte::page')
@section('content_header')
<h1>{{ $title}}</h1>
@stop
@section('content')
 <div class="box">
	@include('layouts.alerts')
	<div class="box-header">
		<a class="btn btn-sm btn-info" href="{{route('fornecedor')}}">
			<i class="fa fa-step-backward"></i> Voltar
		</a>
	 </div>
	  <div class="box-body">
		@if(isset($fnc))
		 <form method="post" action="{{route('fornecedor.update',$fnc->idfnc)}}" enctype="multipart/form-data">
			{!! method_field('put') !!}
			@else
			<form method="post" action="{{route('fornecedor.store')}}" enctype="multipart/form-data">
				@endif
				{!! csrf_field() !!}
				<div class="box-body">
					<div class="row well">
						<div class="col-md-12">
							<div class="row">
								<div class="col-md-3">
									<div class="form-group">
										<label>Número</label>
										<input type="text" name="numero" class="form-control input-sm" value="{{$fnc->fnc_numero ?? $numero}}" readonly>
									</div>
								</div>
								<div class="col-md-9">
									<div class="form-group">
										<label for="nome">Nome</label>
										<input type="text" name="nome" class="form-control input-sm" value="{{$fnc->nome ?? null}}" required>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label for="nome">Morada</label>
										<input type="text" name="morada" class="form-control input-sm" value="{{$fnc->morada ?? null}}" >
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label for="nome">Telefone</label>
										<input type="text" name="telefone" class="form-control input-sm" value="{{$fnc->telefone ?? null}}">
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="nome">Celular</label>
										<input type="text" name="celular" class="form-control input-sm" value="{{$fnc->celular ?? null}}">
									</div>
								</div>

							</div>
							<div class="row">
								<div class="col-md-8">
									<div class="form-group">
										<label for="nome">E-mail</label>
										<input type="email" name="email" class="form-control input-sm" value="">
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="nome">NUIT</label>
										<input type="text" name="nuit" class="form-control input-sm" value="">
									</div>
								</div>
							</div>

						</div>

						<div class="col-md-6">
						</div>
						</div>
				</div>
				<div class="box-footer">
					<div class="col-md-6">
						@if(isset($del))
						<a href="{{ route("fornecedor.destroy", $Fnc->idfnc) }}" class="btn btn-danger"><i class="fa fa-trash"></i> Apagar</a>
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
