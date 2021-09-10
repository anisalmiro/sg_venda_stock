  
<table id="docs" class="table table-hover">
	<tr>
	  <th>Descrição do documento</th>
	  <th>Ficheiro</th>
	  <th></th>
	</tr>
	@if(isset($qualificacao))
		@foreach($qualificacao as $q)
			<tr>
				<td>
					<input id="descricaodoc" type="text" name="descricaodocL[]" readonly value="{{$q->descricao}}" class="form-control" />
					<input type="hidden" name="new[]" value="false"> 
				</td>
				<td>
					<input id="path" type="text" name="pathL[]" value="{{$q->path}}" readonly class="form-control" placeholder="{{$q->path}}" />
				</td>
				<td>
					<button class="btn btn-danger btn-sm" onclick="removeLinha(this)" type="button" value="{{$q->idqualificacao}}"><i class="fa fa-remove"></i>&nbsp;Remover</button>
				</td>
			</tr>
		@endforeach
	@endif
</table>
 <div class="modal fade" id="modal-docs">
  <div class="modal-dialog">
	<div class="modal-content">
	  <div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		  <span aria-hidden="true">&times;</span></button>
		<h4 class="modal-title">Qualificações Literárias</h4>
	  </div>
	  <div class="modal-body">
		<div class="col-md-12">
		  <div class="form-group">
			<label>Tipo</label>
			 <select class="form-control select2" name="idtipod" id="idtipod" style="width: 100%;">
			  <option value="" selected="selected">Seleccione</option>
					<option>CV</option>
					<option>Certificado de Habilitações Literárias</option>
					<option>Formação Auxiliar</option>
			</select>
		  </div>
		  <!-- /.form-group -->
		</div>
		<!-- /.col -->
	  </div>
	  <div class="modal-footer">
		<button type="button" id="close" class="btn btn-default pull-left" data-dismiss="modal">Fechar</button>
		<button type="button" class="btn btn-info" onClick="addAnexos();" data-dismiss="modal">Adicionar</button>
	  </div>
	</div>
	<!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>