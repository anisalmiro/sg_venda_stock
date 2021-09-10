@extends('adminlte::page')

@section('content_header')
		<h1>Lista de Productos e Serviços</h1>
@stop

@section('content')
	<div class="box">
		<div class="box-header">
			<a class="btn btn-sm btn-success" href="{{route('producto-servico.create')}}">
				<i class="fa fa-plus-circle"></i> Novo
			</a>
		</div>

		<div class="box-body table-responsive">
			<table id="table" class="table table-striped table-bordered _datatable_">
				<thead>
					<th>Nº</th>
					<th>Referência</th>
					<th>Descrição</th>
					<th>Tipo de estoque</th>
					<th>Armazém</th>
					<th>Marca</th>
					<th>Data de criação</th>
					<th class="noExport">Acções</th>
				</thead>
				<tbody>
									
				</tbody>
			</table>
		</div>
	</div>
@stop

@section('js')
<script>
	$('#table').DataTable({
		processing: true,
			serverSide: true,
			// responsive: true,
			dom: 'lBfrtip',
			search: {
				"case-insensitive": true
			},
			ajax: '{!! route('getproductoservico') !!}',
			columns: [
				{ data: 'stk_id', name: 'stk_id' },
				{ data: 'stk_referencia', name: 'stk_referencia' },
				{ data: 'stk_descricao', name: 'stk_descricao' },
				{ data: 'stk_servico', name: 'stk_servico' },
				{ data: 'stk_armazemid', name: 'stk_armazemid' },
				{ data: 'stk_marcaid', name: 'stk_marcaid' },
				{ data: 'stk_datacriacao', name: 'stk_datacriacao' },
				{ data: 'action', name: 'action', orderable: false, searchable: false }
		],
		buttons: [
			{
				extend: 'excel',
								title: 'Lista de estoque',
								text: '<i class="fa fa-file-excel-o" style="font-size:20px; color: green"></i>',
								exportOptions: {
										columns: "thead th:not(.noExport)"
								}
						},
						{
							extend: 'pdf',
								title: 'Lista de Clientes',
								text: '<i class="fa fa-file-pdf-o" style="font-size:20px; color: red"></i>',
								orientation: 'landscape',
								exportOptions: {
										columns: "thead th:not(.noExport)"
								},
						},
						{
							text: '<i class="fa fa-refresh" style="font-size:20px"></i>',
								action: function ( e, dt, node, config ) {
										dt.ajax.reload();
								}
						}
				],
				language: {
					"lengthMenu": "Mostrar _MENU_ registros por página",
						"zeroRecords": "Nenhum registo encontrado",
						"info": "Mostrando página _PAGE_ de _PAGES_",
						"infoEmpty": "Sem registros disponíveis",
						"infoFiltered": "(filtrado de _MAX_ registros totais)",    
						"loadingRecords": "Carregando...",
						"processing":     "Processando...",
						"search":         "Pesquisar:",
						"paginate": {
							"first":      "Primeiro",
								"last":       "Último",
								"next":       "Próximo",
								"previous":   "Anterior"
						},
				}
		});
</script>
@endsection