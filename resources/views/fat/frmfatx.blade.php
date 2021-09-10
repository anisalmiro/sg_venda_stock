@extends('adminlte::page')

@section('content_header')
    <h1>{{ $title}}</h1>
@stop

@section('content')
  <div class="box">
      @include('layouts.alerts')
    <div class="box-header">
      <a class="btn btn-sm btn-info" href="{{route('fats',$tipofat->tipofat_id)}}">
        <i class="fa fa-step-backward"></i> Voltar
      </a>
    </div>
    <div class="box-body">
      @if(isset($update))
      <form method="post" action="{{route('fat.update',$fat->fat_id)}}" enctype="multipart/form-data">
        {!! method_field('put') !!}
      @else
        <form method="post" action="{{route('fat.store')}}" enctype="multipart/form-data">
      @endif      
      {!! csrf_field() !!}
      <input type="hidden" name="fat_tipofatid" value="{{$tipofat->tipofat_id}}" >
      <div class="box-body"> 
        <div class="row well">
          <div class="row">
            <div class="col-md-6">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Número do Documento</label>
                  <input type="text" name="fat_numero" class="form-control input-sm" readonly value="{{$numero ?? $fat->fat_numero}}" >
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Moeda</label>
                  <select name="fat_moedaid" class="form-control input-sm" @if(isset($show)) disabled @endif >
                    @foreach($moeda as $t)
                      <option value="{{ $t->moeda_id }}" @if(isset($fat) && $fat->fat_moedaid == $t->moedaid) selected @endif    >{{ $t->moeda_descricao }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
            </div>
            
          </div>          
          <div class="col-md-6">            
            <div class="row col-md-12">
              <div class="form-group">
                <label>Cliente</label>
                @if(isset($show))
                  <select name="fat_cliid" class="form-control input-sm" disabled>
                @else
                  <select name="fat_cliid" class="form-control select2 input-sm">
                @endif
                  <option value="">Seleccione</option>
                  @foreach($cli as $t)
                    <option value="{{ $t->cli_id }}" @if(isset($fat) && $fat->fat_cliid == $t->cli_id) selected="true" @endif>{{ $t->cli_nome." | ".$t->cli_numero }}</option>
                  @endforeach
                </select>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="col-md-6">
              <div class="form-group">
                <label>Data Emissão</label>
                <input type="date" name="fat_dataemissao" class="form-control input-sm" value="{{$fat->fat_dataemissao ?? date('Y-m-d')}}" @if(isset($show)) readonly @endif>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Data Vencimento</label>
                <input type="date" name="fat_datavencimento" class="form-control input-sm" value="{{$fat->fat_datavencimento ?? date('Y-m-d', strtotime('+30 days'))}}" @if(isset($show)) readonly @endif>
              </div>
            </div>
          </div>  
          <div class="row col-md-12 badge badge-roundless" style="border-radius: 0; text-align: left;" >
              @if(!isset($fatitem))
              <button style="margin-left: 15px" type="button" name="addLine" id="addLine" class="btn btn-default btn-sm" data-toggle="modal" data-target="#modal-addline"><i class="fa fa-file"></i> Introduzir</button>
              @endif
            <div class="col-md-12 table-responsive">
              <table id="fatitems" class="table table-bordered">
                <tr>
                  <th style="width: 25%">Descrição</th>
                  <th style="width: 5%">Quant.</th>
                  <th>Preço Unit.</th>
                  <th>Subtotal</th>
                  {{-- <th>%Desc</th> --}}
                  <th>Desconto</th>
                  {{-- <th>Tab. IVA</th> --}}
                  <th>IVA Inc.</th>
                  <th>Valor IVA</th>
                  <th style="width: 13%">Total</th>
                  <th>Acção</th>
                </tr>
                @if(isset($fatitem))
                  @foreach($fatitem as $t)
                    <tr>
                      <td>{{$t->fatitem_descricao}}</td>
                      <td>{{$t->fatitem_quantidade}}</td>
                      <td>{{$t->fatitem_preco}}</td>
                      <td>{{$t->fatitem_subtotal}}</td>
                      <td>{{$t->fatitem_percentdesconto}}</td>
                      <td>{{$t->fatitem_valordesconto}}</td>
                      <td>{{$t->fatitem_tabivaid}}</td>
                      <td>{{$t->fatitem_ivaincluido}}</td>
                      <td>{{$t->fatitem_valoriva}}</td>
                      <td>{{$t->fatitem_total}}</td>
                    </tr>
                  @endforeach
                @endif
              </table>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              &nbsp;
            </div>
            <div class="form-group">
              <div class="col-sm-9">
                <label class="col-sm-4 control-label pull-right" style="text-align: right">Subtotal</label>
              </div>              
              <div class="col-sm-3">
                <input type="text" class="form-control" readonly id="c_subtotal" name="fat_subtotal" value="{{$fat->fat_subtotal ?? 0}}">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              &nbsp;
            </div>
            <div class="form-group">
              <div class="col-sm-9">
                <label class="col-sm-4 control-label pull-right" style="text-align: right">Desconto</label>
              </div>              
              <div class="col-sm-3">
                <input type="text" class="form-control" readonly id="c_valordesconto" name="fat_valordesconto" value="{{$fat->fat_valordesconto ?? 0}}">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              &nbsp;
            </div>
            <div class="form-group">
              <div class="col-sm-9">
                <label class="col-sm-4 control-label pull-right" style="text-align: right;">IVA</label>
              </div>              
              <div class="col-sm-3">
                <input type="text" class="form-control" readonly id="c_totaliva" name="fat_totaliva" value="{{$fat->fat_totaliva ?? 0}}">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              &nbsp;
            </div>
            <div class="form-group">
              <div class="col-sm-9">
                <label class="col-sm-4 control-label pull-right" style="text-align: right">Total</label>
              </div>              
              <div class="col-sm-3">
                <input type="text" class="form-control" readonly id="c_total" name="fat_total" value="{{$fat->fat_total ?? 0}}">
              </div>
            </div>
          </div>
        </div>
      </div>
      @include("fat.modaladdline")
      <div class="box-footer">
        <div class="col-md-6">
          @if(isset($del))
            <a href="{{ route("fat.destroy", $fat->fat_id) }}" class="btn btn-danger"><i class="fa fa-trash"></i> Apagar</a>
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
<script>

 //GRID DE FATITENS
(function($) {
    addLines = function() {
    var stk_descricao=document.getElementById('stk_descricao').value;
    var stk_quant=document.getElementById('stk_quant').value;
    var stk_preco=document.getElementById('stk_preco').value;
    var stk_subtotal=document.getElementById('stk_subtotal').value;
    var stk_percdesconto=document.getElementById('stk_percdesconto').value;
    var stk_valordesconto=document.getElementById('stk_valordesconto').value;
    var stk_tabivaid=document.getElementById('stk_tabivaid').value;
    var stk_valoriva=document.getElementById('stk_valoriva').value;
    var stk_ivaincluido= 0;
    var stk_total=document.getElementById('stk_total').value;
    if(document.getElementById('stk_ivaincluido').checked==true){
      stk_ivaincluido = 1;
    }

    var newRow = $("<tr>");
    var cols = "";
    cols += '<td><input id="fatitem_descricao" type="text" name="l_descricao[]" readonly value="'+stk_descricao+'" class="form-control" /><input type="hidden" name="new[]" value="true"><input type="hidden" name="update[]" value="false"> </td>';
    cols += '<td><input id="fatitem_quantidade" type="text" name="l_quantidade[]" readonly value="'+stk_quant+'" class="form-control" /></td>';
    cols += '<td><input id="fatitem_preco" type="text" name="l_preco[]" readonly value="'+stk_preco+'" class="form-control" /></td>';
    cols += '<td><input id="fatitem_subtotal" type="text" name="l_subtotal[]" readonly value="'+stk_subtotal+'" class="form-control" /></td>';
    cols += '<input id="fatitem_percentedesconto" type="hidden" name="l_percentedesconto[]" readonly value="'+stk_percdesconto+'" class="form-control" />';
    cols += '<td><input id="fatitem_valordesconto" type="text" name="l_valordesconto[]" readonly value="'+stk_valordesconto+'" class="form-control" /></td>';
    cols += '<input id="fatitem_tabivaid" type="hidden" name="l_tabivaid[]" readonly value="'+stk_tabivaid+'" class="form-control" />';
    cols += '<td><input id="fatitem_ivaincluido" type="text" name="l_ivaincluido[]" readonly class="form-control" value="'+stk_ivaincluido+'" /></td>';
    cols += '<td><input id="fatitem_valoriva" type="text" name="l_valoriva[]" readonly value="'+stk_valoriva+'" class="form-control" /></td>';
    cols += '<td><input id="fatitem_total" type="text" name="l_total[]" readonly value="'+stk_total+'" class="form-control" /></td>';
    cols += '<td>';
    cols += '<button class="btn btn-danger btn-sm" onclick="removeLinha(this)" type="button" title="Remover Linha"><i class="fa fa-trash"></i></button>';
    cols += '</td></tr>';

    newRow.append(cols);
    $("#fatitems").append(newRow);
    total();

    return false;
    }
})(jQuery); 

(function($) {
    removeLinha = function(item) {
      var fatitem_id = $(item).val()
      var fatitem_ids = ''
      var tr = $(item).closest('tr')
      var deleteds = ''
      // deleteds += '<input type="text" name="deleteds[]" readonly value="'+fatitem_id+'" class="form-control" />';
      // $("#deleteds").append(deleteds);
      tr.remove()      
      total()
      return false
    }
})(jQuery); 
</script>
@stop