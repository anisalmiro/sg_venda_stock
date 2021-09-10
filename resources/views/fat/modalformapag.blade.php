<div class="modal fade" id="modal-formapag">
	<div class="modal-dialog">
		<div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Forma de Pagamento da {{ $tipofat->tipofat_descricao}}</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group form-group-sm">
                            <label for="tipopag_id" class="col-md-4 control-label">Forma de Pagamento</label>
                            <div class="col-md-8">
                                <select class="select2" id="tipopag_id" style="width: 100%;">
                                    <option value="" selected="selected">Seleccione</option>
                                    @foreach($tipopag as $t)
                                        <option value="{{ $t->tipopag_id }}" >{{ $t->tipopag_descricao }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <input type="hidden"  id="tipopag_descricao" class="form-control">
                        </div>
                        <div class="form-group form-group-sm">
                            <label for="tipopag_numero" class="col-md-4 control-label">Número</label>
                            <div class="col-md-8">
                                <input type="text"  id="tipopag_numero" class="form-control">
                            </div>                            
                        </div>
                        <div class="form-group form-group-sm">
                            <label for="tipopag_data" class="col-md-4 control-label">Data de Pagamento</label>
                            <div class="col-md-8">
                                <input type="date"  id="tipopag_data" class="form-control">
                            </div>                            
                        </div>
                        <div class="form-group form-group-sm">
                            <label for="tipopag_bancoid" class="col-md-4 control-label">Banco de Pagamento</label>
                            <div class="col-md-8">
                                <select class="select2" id="tipopag_bancoid" style="width: 100%;">
                                    <option value="" selected="selected">Seleccione</option>
                                    @foreach($banco as $t)
                                        <option value="{{ $t->banco_id }}" >{{ $t->banco_descricao }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <input type="hidden"  id="tipopag_bancodescricao" class="form-control">
                        </div>
                        <div class="form-group form-group-sm">
                            <label for="tipopag_contatesouraid" class="col-md-4 control-label">Local de Tesouraria</label>
                            <div class="col-md-8">
                                <select class="select2" id="tipopag_contatesouraid" style="width: 100%;">
                                    <option value="" selected="selected">Seleccione</option>
                                    @foreach($contatz as $t)
                                        <option value="{{ $t->contatesoura_id }}" >{{ $t->contatesoura_descricao }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <input type="hidden"  id="tipopag_contatesouradescricao" class="form-control">
                        </div>
                        <div class="form-group form-group-sm">
                            <label for="tipopag_valor" class="col-md-4 control-label">Valor Pago</label>
                            <div class="col-md-8">
                                <input type="text"  id="tipopag_valor" class="form-control">
                            </div>                            
                        </div>
				    </div>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Fechar</button>
                <button type="button" class="btn btn-info" onClick="addFormapag();" data-dismiss="modal">Adicionar</button>
            </div>
		</div>
		<!-- /.modal-content -->
	</div>
</div>