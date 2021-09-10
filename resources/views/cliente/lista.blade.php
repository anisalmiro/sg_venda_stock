@extends('adminlte::page')

@section('content_header')
    <h1>Lista de Clientes</h1>
@stop

@section('content')
  <div class="box">        
    <div class="box-header">
      <a class="btn btn-sm btn-success" href="{{route('cliente.create')}}">
        <i class="fa fa-plus-circle"></i> Novo
      </a>
    </div>
    @include('layouts.alerts')
    <div class="box-body table-responsive">
      <table id="clientes_table" class="table table-striped table-bordered _datatable_">
        <thead>
          <th>N&ordm;</th>
          <th>Nome</th>
          <th>Morada</th>
          <th>Telefone</th>
          <th>Celular</th>
          <th>Email</th>
          <th>NUIT</th>
          <th>Estado</th>
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
          ajax: '{!! route('getclientes') !!}',
          columns: [
            { data: 'cli_numero', name: 'cli_numero' },
            { data: 'cli_nome', name: 'cli_nome' },
            { data: 'cli_morada', name: 'cli_morada' },
            { data: 'cli_telefone', name: 'cli_telefone' },
            { data: 'cli_celular', name: 'cli_celular' },
            { data: 'cli_email', name: 'cli_email' },
            { data: 'cli_nuit', name: 'cli_nuit' },
            { data: 'cli_estado', name: 'cli_estado' },
            { data: 'action', name: 'action', orderable: false, searchable: false }
          ],
          buttons: [
              {
                extend: 'excel',
                title: 'Lista de Clientes',
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