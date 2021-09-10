@extends('adminlte::page')

@section('content_header')
    <h1>Listagem de {{ $tipofat->tipofat_descricao }}</h1>
@stop

@section('content')
  <div class="box">    
    <div class="box-header">
      <a class="btn btn-sm btn-info" href="{{route('tiposfat')}}">
        <i class="fa fa-step-backward"></i> Voltar
      </a>
      <a class="btn btn-sm btn-success" href="{{route('fat.create',$tipofat->tipofat_id)}}">
        <i class="fa fa-plus-circle"></i> Novo
      </a>
    </div>
    @include('layouts.alerts')	
    <div class="box-body table-responsive">
      <table id="clientes_table" class="table table-striped table-bordered _datatable_">
        <thead>
          <th>N&ordm; Cliente</th>
          <th>Nome do Cliente</th>
          <th>N&ordm; Documento</th>
          <th>Data de Emissão</th>
          <th>Data de Validade</th>
          <th>Valor Total</th>
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
      $('#clientes_table').DataTable({
          processing: true,
          serverSide: true,
          // responsive: true,
          dom: 'lBfrtip',
          search: {
            "case-insensitive": true
          },
          ajax: '{!! route('getfats',$tipofat->tipofat_id) !!}',
          columns: [
            { data: 'cli_numero', name: 'cli_numero' },
            { data: 'cli_nome', name: 'cli_nome' },
            { data: 'fat_numero', name: 'fat_numero' },
            { data: 'fat_dataemissao', name: 'fat_dataemissao' },
            { data: 'fat_datavencimento', name: 'fat_datavencimento' },
            { data: 'fat_total', name: 'fat_total' },
            { data: 'action', name: 'action', orderable: false, searchable: false }
          ],
          buttons: [
              {
                extend: 'excel',
                title: 'Listagem de {{ $tipofat->tipofat_descricao }}',
                text: '<i class="fa fa-file-excel-o" style="font-size:20px; color: green"></i>',
                exportOptions: {
                    columns: "thead th:not(.noExport)"
                }
              },
              {
                extend: 'pdf',
                title: 'Listagem de {{ $tipofat->tipofat_descricao }}',
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