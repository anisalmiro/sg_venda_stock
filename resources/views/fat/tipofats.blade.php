@extends('adminlte::page')

@section('content_header')
    <h1>Selecione o documento de faturação que deseja operar</h1>
@stop

@section('content')
  <div class="box"> 
    <div class="box-body table-responsive">
      <table id="clientes_table" class="table table-striped table-bordered _datatable_">
        <thead>
          <th>Descrição</th>
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
          search: {
            "case-insensitive": true
          },
          ajax: '{!! route('gettiposfat') !!}',
          columns: [
            { data: 'tipofat_descricao', name: 'tipofat_descricao' },
            { data: 'action', name: 'action', orderable: false, searchable: false }
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