<div class="modal fade" id="modal-addline">
	<div class="modal-dialog">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title">Item da {{ $tipofat->tipofat_descricao}}</h4>
		  </div>
		  <div class="modal-body">			
			<div class="row">
				<div class="col-md-12">
					<div class="form-group form-group-sm">
						<label for="stk_id" class="col-md-2 control-label">Artigo</label>
						<div class="col-md-10">
							<select class="select2" id="stk_id" style="width: 100%;">
								<option value="" selected="selected">Seleccione</option>
								@foreach($stk as $t)
									<option value="{{ $t->stk_id }}" >{{ $t->stk_descricao }}</option>
								@endforeach
							</select>
						</div>
						<input type="hidden"  id="stk_descricao" class="form-control">
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group form-group-sm">
						<label for="stk_quant" class="col-md-4 control-label">Quantidade</label>
						<div class="col-md-8">
							<input type="text"  id="stk_quant" class="form-control" value="0" onkeyup="subtotall()">
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group form-group-sm">
						<label for="stk_preco" class="col-md-4 control-label">Preço Unit.</label>
						<div class="col-md-8">
							<input type="text" id="stk_preco" class="form-control" value="0" onkeyup="subtotall()">
						</div>
					</div>
				</div>
				<div class="col-md-12">
					<div class="form-group form-group-sm">
						<label for="stk_subtotal" class="col-md-2 control-label">Subtotal</label>
						<div class="col-md-10">
							<input type="text"  id="stk_subtotal" class="form-control" readonly style="width: 100%">
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group form-group-sm">
						<label for="stk_percdesconto" class="col-md-4 control-label">% Desc.</label>
						<div class="col-md-8">
							<input type="text" id="stk_percdesconto" class="form-control" value="0">
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group form-group-sm">
						<label for="stk_valordesconto" class="col-md-4 control-label">Desconto</label>
						<div class="col-md-8">
							<input type="text" id="stk_valordesconto" class="form-control" value="0" onkeyup="totall()">
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group form-group-sm">
						<label for="stk_tabivaid" class="col-md-4 control-label">Tab. IVA</label>
						<div class="col-md-8">
							<select id="stk_tabivaid" class="select2" style="width: 100%" onchange="subtotall()">
								@foreach($tabiva as $t)
									<option value="{{ $t->tabiva_id }}">{{ $t->tabiva_descricao }}</option>
								@endforeach
							</select>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group form-group-sm">
						<label for="stk_percdesconto" class="col-md-4 control-label">Valor IVA</label>
						<div class="col-md-8">
							<input type="text" id="stk_valoriva" class="form-control" readonly>
						</div>
					</div>
				</div>
				<div class="col-md-12">
					<div class="form-group form-group-sm">
						<label for="stk_percdesconto" class="col-md-2 control-label">IVA Incluído</label>
						<div class="col-md-10">
							<input type="checkbox" class="pull-left" id="stk_ivaincluido" onchange="subtotall()">
						</div>
					</div>
				</div>
				<div class="col-md-12">
					<div class="form-group form-group-sm">
						<label for="stk_total" class="col-md-2 control-label">Total</label>
						<div class="col-md-10">
							<input type="text"  id="stk_total" class="form-control" readonly style="width: 100%">
						</div>
					</div>
				</div>
			</div>
			
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Fechar</button>
			<button type="button" class="btn btn-info" onClick="addLines();" data-dismiss="modal">Adicionar</button>
		  </div>
		</div>
		<!-- /.modal-content -->
	</div>
</div>