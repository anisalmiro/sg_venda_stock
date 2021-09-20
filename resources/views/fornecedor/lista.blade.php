@extends('adminlte::page')

@section('content_header')
    <h1>Lista de fornecedores</h1>
@stop

@section('content')
  <div class="box">
    <div class="box-header">
      <a class="btn btn-sm btn-success" href="{{route('fornecedor.create')}}">
        <i class="fa fa-plus-circle"></i> Novo
      </a>
    </div>
    @include('layouts.alerts')
    <div class="box-body table-responsive">
      <table id="fornecedores_table" class="table table-striped table-bordered _datatable_">
        <thead>
          <th>N&ordm;</th>
          <th>Nome</th>
          <th>Morada</th>
          <th>Telefone</th>
          <th>Celular</th>
          <th>Email</th>
          <th>NUIT</th>
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
      $('#fornecedores_table').DataTable({
          processing: true,
          serverSide: true,
          // responsive: true,
          dom: 'lBfrtip',
          search: {
            "case-insensitive": true
          },
          ajax: '{!! route('getfornecedores') !!}',
          columns: [
            { data: 'fnc_numero', name: 'fnc_numero' },
            { data: 'nome', name: 'nome' },
            { data: 'morada', name: 'morada' },
            { data: 'telefone', name: 'telefone' },
            { data: 'celular', name: 'celular' },
            { data: 'email', name: 'email' },
            { data: 'nuit', name: 'nuit' },
            { data: 'action', name: 'action', orderable: false, searchable: false }
          ],
          buttons: [
              {
                extend: 'excel',
                title: 'Lista de fornecedores',
                text: '<i class="fa fa-file-excel-o" style="font-size:20px; color: green"></i>',
                exportOptions: {
                    columns: "thead th:not(.noExport)"
                }
              },
              {
                extend: 'pdf',
                title: 'Lista de fornecedores',
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
