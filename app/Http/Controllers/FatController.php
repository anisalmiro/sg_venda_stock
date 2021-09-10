<?php

namespace App\Http\Controllers;
use DB;
use Yajra\Datatables\Datatables;
use App\Models\Stk;
use App\Models\Tipofat;
use App\Models\Fat;
use App\Models\Fatitem;
use App\Models\Cli;
use App\Models\Cencusto;
use App\Models\Arm;
use App\Models\Vend;
use App\Models\Moeda;
use App\Models\Tabiva;
use App\Models\Tipopag;
use App\Models\Contatesoura;
use App\Models\Banco;
use App\Models\Formapag;

use Illuminate\Http\Request;

class FatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('fat.tipofats');
    }

    public function listafats($tipofat_id)
    {
        $tipofat = Tipofat::where('tipofat_id',$tipofat_id)->first();
        return view('fat.listafats', compact('tipofat'));
    }

    //LISTA DE TIPOS DE DOCUMENTOS DE FATURACAO
    public function getFats($tipofat_id)
    {
        $query = "select cli_numero, cli_nome, fat_numero, fat_dataemissao, fat_datavencimento, fat_total, fat_id from fat inner join cli on fat_cliid=cli_id where fat_tipofatid=".$tipofat_id." ";

        $fat = DB::select($query);

        return Datatables::of($fat)->addColumn('action', function ($u) {

            $ver = '<a href="'.route("fat.show",$u->fat_id).'" class="btn btn-xs btn-primary" title="Visualizar"><i class="fa fa-eye"></i></a>';

            $editar = ' <a href="'.route("fat.edit",$u->fat_id).'" class="btn btn-xs btn-primary" title="Editar"><i class="fa fa-pencil"></i></a>';

            $apagar = ' <a href="'.route("fat.delete",$u->fat_id).'" class="btn btn-xs btn-danger" title="Apagar"><i class="fa fa-trash"></i></a>';

            $link = $ver.$editar.$apagar;

            return $link;
        })->removeColumn('tipofat_id')->make();
    }

    //LISTA DE TIPOS DE DOCUMENTOS DE FATURACAO
    public function getTiposFat()
    {
        $query = "select tipofat_descricao, tipofat_id from tipofat order by tipofat_descricao";

        $tipofat = DB::select($query);

        return Datatables::of($tipofat)->addColumn('action', function ($u) {

            $ver = '<a href="'.route("fats",$u->tipofat_id).'" class="btn btn-xs btn-primary" title="Abrir"><i class="fa fa-folder"></i></a>';

            // $editar = ' <a href="'.route("cliente.edit",$u->cli_id).'" class="btn btn-xs btn-primary" title="Editar"><i class="fa fa-pencil"></i></a>';

            // $apagar = ' <a href="'.route("cliente.delete",$u->cli_id).'" class="btn btn-xs btn-danger" title="Apagar"><i class="fa fa-trash"></i></a>';

            $link = $ver;

            return $link;
        })->removeColumn('tipofat_id')->make();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($tipofat_id)
    {
        $tipofat = Tipofat::where('tipofat_id',$tipofat_id)->first();
        $fat     = Fat::where('fat_tipofatid',$tipofat->tipofat_id)->orderBy("fat_numero","desc")->first();
        $cli     = Cli::orderBy('cli_nome')->get();
        $ccusto  = Cencusto::orderBy("cencusto_descricao")->get();
        $arm     = Arm::orderBy("arm_descricao")->get();
        $vend    = Vend::orderBy("vend_nome")->get();
        $moeda   = Moeda::orderBy("moeda_id")->get();
        $stk     = Stk::orderBy("stk_descricao")->get();
        $tabiva  =Tabiva::orderBy("tabiva_id","desc")->get();
        $tipopag = Tipopag::get();
        $banco   = Banco::orderBy("banco_descricao")->get();
        $contatz = Contatesoura::orderBy("contatesoura_descricao")->get();
        $title   = "Cadastrar ".$tipofat->tipofat_descricao;

        if($fat == null)
            $numero = 1;
        else
            $numero = $fat->fat_numero+1;

        $route = "fats";
        $id    = $tipofat_id;
        return view('fat.frmfat', compact('tipofat', 'cli', 'title', 'numero', "ccusto", "arm", "vend", "moeda", "stk", "tabiva", 'tipopag', 'banco', 'contatz', "route", "id"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $itens = array();
        $fp    = array();
        $insFp = 1;
        $data  = $request->only(['fat_tipofatid','fat_numero', 'fat_moedaid', 'fat_numerointerno','fat_cambio','fat_cliid','fat_dataemissao','fat_datavencimento','fat_cencustoid','fat_vendid','fat_subtotal','fat_valordesconto','fat_totaliva', 'fat_total', '_token']);

            //dd($data);
        $item = $request->only(['l_stkid', 'l_descricao', 'l_quantidade', 'l_preco', 'l_subtotal', 'l_percentedesconto', 'l_valordesconto', 'l_tabivaid', 'l_ivaincluido', 'l_valoriva', 'l_total']); 
                
        $fat = Fat::where('fat_tipofatid',$data['fat_tipofatid'])->orderBy("fat_numero","desc")->first();

        if($fat == null)
            $data['fat_numero'] = $data['fat_numero'];
        else{
            if($fat->fat_numero > $data['fat_numero']){
                $data['fat_numero'] = $fat->fat_numero+1;
            }
        }            
             
        $data['fat_id'] = DB::select('SELECT UPPER(LEFT(uuid(), 15)) id')[0]->id; 

        DB::beginTransaction();

        $insert = Fat::create($data);

        for ($i=0; $i <count($item['l_preco']) ; $i++) {
            $itens[$i] = [
                'fatitem_stkid'            => $item['l_stkid'][$i]=='' ? null : $item['l_stkid'][$i],
                'fatitem_descricao'        => $item['l_descricao'][$i],
                'fatitem_quantidade'       => $item['l_quantidade'][$i],
                'fatitem_preco'            => $item['l_preco'][$i],
                'fatitem_subtotal'         => $item['l_subtotal'][$i],
                'fatitem_percentdesconto'  => $item['l_percentedesconto'][$i],
                'fatitem_valordesconto'    => $item['l_valordesconto'][$i],
                'fatitem_tabivaid'         => $item['l_tabivaid'][$i],
                'fatitem_ivaincluido'      => $item['l_ivaincluido'][$i],
                'fatitem_valoriva'         => $item['l_valoriva'][$i],
                'fatitem_total'            => $item['l_total'][$i],
                'fatitem_fatid'            => $data['fat_id'],
            ];
            $insItens = Fatitem::create($itens[$i]);
        }
        #Formas de pagamento se for vd
        if($data['fat_tipofatid']==2){
            $formapag = $request->only(['l_tipopagid', 'l_tipopag_numero', 'l_tipopag_data', 'l_tipopag_bancoid', 'l_tipopag_contatesouraid', 'l_tipopag_valor']);

            for ($i=0; $i <count($formapag['l_tipopagid']) ; $i++) {
                $fp[$i] = [
                    'formapag_id'             => DB::select('SELECT UPPER(LEFT(uuid(), 15)) id')[0]->id,
                    'formapag_tipopagid'      => $formapag['l_tipopagid'][$i]=='' ? null : $formapag['l_tipopagid'][$i],
                    'formapag_numero'         => $formapag['l_tipopag_numero'][$i],
                    'formapag_bancoid'        => $formapag['l_tipopag_bancoid'][$i]=='' ? null : $formapag['l_tipopag_bancoid'][$i],
                    'formapag_data'           => $formapag['l_tipopag_data'][$i],
                    'formapag_contatesouraid' => $formapag['l_tipopag_contatesouraid'][$i]=='' ? null : $formapag['l_tipopag_contatesouraid'][$i],
                    'formapag_valor'          => $formapag['l_tipopag_valor'][$i],
                    'formapag_fatid'          => $data['fat_id'],
                ];
                $insFp = Formapag::create($fp[$i]);
            }
        }

        if ($insert && $insItens && $insFp) {
            DB::commit();
            return redirect()
                ->route('fats', $data['fat_tipofatid'])
                ->with('success',"Documento Gravado com Sucesso.");
        }else{
            DB::rollBack();
            return redirect()
                ->back()
                ->with('error', 'Erro ao Gravar!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $fat     = Fat::where('fat_id',$id)->first();
        $tipofat = Tipofat::where('tipofat_id',$fat->fat_tipofatid)->first();
        $fatitem = Fatitem::where('fatitem_fatid',$id)->get();
        $cli     = Cli::orderBy('cli_nome')->get();
        $ccusto  = Cencusto::orderBy("cencusto_descricao")->get();
        $arm     = Arm::orderBy("arm_descricao")->get();
        $vend    = Vend::orderBy("vend_nome")->get();
        $moeda   = Moeda::orderBy("moeda_id")->get();
        $stk     = Stk::orderBy("stk_descricao")->get();
        $tabiva  =Tabiva::orderBy("tabiva_id")->get();
        $tipopag = Tipopag::get();
        $banco   = Banco::orderBy("banco_descricao")->get();
        $contatz = Contatesoura::orderBy("contatesoura_descricao")->get();

        $query = "select formapag.*, tipopag_descricao, contatesoura_descricao, banco_descricao from formapag left join tipopag on formapag_tipopagid=tipopag_id left join banco on formapag_bancoid=banco_id left join contatesoura on formapag_contatesouraid=contatesoura_id where formapag_fatid='".$id."' ";

        $formapag = DB::select($query);

        $title   = "Visualizar ".$tipofat->tipofat_descricao;
        $show    = true;

        $route = "fats";
        $id    = $tipofat->tipofat_id;

        return view('fat.frmfat', compact('fat', 'fatitem','tipofat', 'cli', 'title', "ccusto", "arm", "vend", "moeda", "stk", "tabiva", 'tipopag', 'banco', 'contatz','formapag','show', "route", "id"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $fat     = Fat::where('fat_id',$id)->first();
        $tipofat = Tipofat::where('tipofat_id',$fat->fat_tipofatid)->first();
        $fatitem = Fatitem::where('fatitem_fatid',$id)->get();
        $cli     = Cli::orderBy('cli_nome')->get();
        $ccusto  = Cencusto::orderBy("cencusto_descricao")->get();
        $arm     = Arm::orderBy("arm_descricao")->get();
        $vend    = Vend::orderBy("vend_nome")->get();
        $moeda   = Moeda::orderBy("moeda_id")->get();
        $stk     = Stk::orderBy("stk_descricao")->get();
        $tabiva  =Tabiva::orderBy("tabiva_id")->get();
        $tipopag = Tipopag::get();
        $banco   = Banco::orderBy("banco_descricao")->get();
        $contatz = Contatesoura::orderBy("contatesoura_descricao")->get();
        $title   = "Editar ".$tipofat->tipofat_descricao;

        $query = "select formapag.*, tipopag_descricao, contatesoura_descricao, banco_descricao from formapag left join tipopag on formapag_tipopagid=tipopag_id left join banco on formapag_bancoid=banco_id left join contatesoura on formapag_contatesouraid=contatesoura_id where formapag_fatid='".$id."' ";

        $formapag = DB::select($query);

        $route = "fats";
        $id    = $tipofat->tipofat_id;

        return view('fat.frmfat', compact('fat', 'fatitem','tipofat', 'cli', 'title', "ccusto", "arm", "vend", "moeda", "stk", "tabiva", 'tipopag', 'banco', 'contatz', 'formapag', "route", "id"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $itens  = array();
        $itensl = array();
        $data   = $request->only(['fat_tipofatid','fat_numero', 'fat_moedaid', 'fat_numerointerno','fat_cambio','fat_cliid','fat_dataemissao','fat_datavencimento','fat_cencustoid','fat_vendid','fat_subtotal','fat_valordesconto','fat_totaliva', 'fat_total', 'fat_id']);

        $item = $request->only(['deleteds','l_stkid','l_descricao', 'new', 'update','l_quantidade','l_preco','l_subtotal','l_percentedesconto','l_valordesconto','l_tabivaid','l_ivaincluido','l_valoriva','l_total']); 
        
        $item_l  = $request->only(['fatitemid_l','stkid_l','descricao_l', 'quantidade_l','preco_l','subtotal_l','percentedesconto_l','valordesconto_l','tabivaid_l','ivaincluido_l','valoriva_l','total_l']);
        
        $deleteds  = $request->input("deleteds");
        $deleteds2 = $request->input("deleteds2");
      
        $data['fat_id'] = DB::select('SELECT UPPER(LEFT(uuid(), 15)) id')[0]->id; 

        $insertItem = 1;
        $updateItem = 1;
        $deleteItem = 1;
        $deleteFP   = 1;
        $insFp      = 1;

        DB::beginTransaction();

        $insert = Fat::where('fat_id',$id)->update($data);
        
        if(isset($item['l_descricao'])){
            for ($i=0; $i <count($item['l_descricao']) ; $i++) {
                $itens[$i] = [
                    'fatitem_stkid'            => $item['l_stkid'][$i]=='' ? null : $item['l_stkid'][$i],
                    'fatitem_descricao'        => $item['l_descricao'][$i],
                    'fatitem_quantidade'       => $item['l_quantidade'][$i],
                    'fatitem_preco'            => $item['l_preco'][$i],
                    'fatitem_subtotal'         => $item['l_subtotal'][$i],
                    'fatitem_percentdesconto'  => $item['l_percentedesconto'][$i],
                    'fatitem_valordesconto'    => $item['l_valordesconto'][$i],
                    'fatitem_tabivaid'         => $item['l_tabivaid'][$i],
                    'fatitem_ivaincluido'      => $item['l_ivaincluido'][$i],
                    'fatitem_valoriva'         => $item['l_valoriva'][$i],
                    'fatitem_total'            => $item['l_total'][$i],
                    'fatitem_fatid'            => $data['fat_id'],
                ];
                $insertItem = Fatitem::create($itens[$i]);
            }
        }

        if(isset($item_l['descricao_l'])){
            for ($i=0; $i <count($item_l['descricao_l']) ; $i++) {
                $itens_l[$i] = [
                    'fatitem_stkid'            => $item_l['stkid_l'][$i]=='' ? null : $item_l['stkid_l'][$i],
                    'fatitem_descricao'        => $item_l['descricao_l'][$i],
                    'fatitem_quantidade'       => $item_l['quantidade_l'][$i],
                    'fatitem_preco'            => $item_l['preco_l'][$i],
                    'fatitem_subtotal'         => $item_l['subtotal_l'][$i],
                    'fatitem_percentdesconto'  => $item_l['percentedesconto_l'][$i],
                    'fatitem_valordesconto'    => $item_l['valordesconto_l'][$i],
                    'fatitem_tabivaid'         => $item_l['tabivaid_l'][$i],
                    'fatitem_ivaincluido'      => $item_l['ivaincluido_l'][$i],
                    'fatitem_valoriva'         => $item_l['valoriva_l'][$i],
                    'fatitem_total'            => $item_l['total_l'][$i],
                    'fatitem_fatid'            => $data['fat_id'],
                ];
                $updateItem = Fatitem::where('fatitem_id',$item_l['fatitemid_l'][$i])->update($itens_l[$i]);
            }
        }

        #Formas de pagamento se for vd
        if($data['fat_tipofatid']==2){
            $formapag = $request->only(['l_tipopagid', 'l_tipopag_numero', 'l_tipopag_data', 'l_tipopag_bancoid', 'l_tipopag_contatesouraid', 'l_tipopag_valor']);

            for ($i=0; $i <count($formapag['l_tipopagid']) ; $i++) {
                $fp[$i] = [
                    'formapag_id'             => DB::select('SELECT UPPER(LEFT(uuid(), 15)) id')[0]->id,
                    'formapag_tipopagid'      => $formapag['l_tipopagid'][$i]=='' ? null : $formapag['l_tipopagid'][$i],
                    'formapag_numero'         => $formapag['l_tipopag_numero'][$i],
                    'formapag_bancoid'        => $formapag['l_tipopag_bancoid'][$i]=='' ? null : $formapag['l_tipopag_bancoid'][$i],
                    'formapag_data'           => $formapag['l_tipopag_data'][$i],
                    'formapag_contatesouraid' => $formapag['l_tipopag_contatesouraid'][$i]=='' ? null : $formapag['l_tipopag_contatesouraid'][$i],
                    'formapag_valor'          => $formapag['l_tipopag_valor'][$i],
                    'formapag_fatid'          => $data['fat_id'],
                ];
                $insFp = Formapag::create($fp[$i]);
            }
        }

        //TRATANDO DOS DELETED
        if(isset($deleteds['deleteds'])){    
            //CICLO PARA APURAR GARANTIAS        
            foreach ($deleteds as $d) {
                $deleteItem = Fatitem::where('fatitem_id',$d)->delete();
            }    
        }

        //dd($deleteds2);
        //TRATANDO DOS DELETED FORMAPAG
        if(isset($deleteds2)){    
            //CICLO PARA APURAR GARANTIAS        
            foreach ($deleteds2 as $e) {
                $deleteFP = Formapag::where('formapag_id',$e)->delete();
            }    
        }

        if ($insert && $insertItem && $deleteItem && $deleteFP && $insFp) {
            DB::commit();
            return redirect()
                ->route('fats', $data['fat_tipofatid'])
                ->with('success',"Documento Atualizado com Sucesso.");
        }else{
            DB::rollBack();
            return redirect()
                ->back()
                ->with('error', 'Erro ao Actualizar!');
        }
    }

    public function delete($id){
        
        $fat     = Fat::where('fat_id',$id)->first();
        $tipofat = Tipofat::where('tipofat_id',$fat->fat_tipofatid)->first();
        $fatitem = Fatitem::where('fatitem_fatid',$id)->get();
        $cli     = Cli::orderBy('cli_nome')->get();
        $ccusto  = Cencusto::orderBy("cencusto_descricao")->get();
        $arm     = Arm::orderBy("arm_descricao")->get();
        $vend    = Vend::orderBy("vend_nome")->get();
        $moeda   = Moeda::orderBy("moeda_id")->get();
        $stk     = Stk::orderBy("stk_descricao")->get();
        $tabiva  =Tabiva::orderBy("tabiva_id")->get();
        $tipopag = Tipopag::get();
        $banco   = Banco::orderBy("banco_descricao")->get();
        $contatz = Contatesoura::orderBy("contatesoura_descricao")->get();
        $title   = "Apagar ".$tipofat->tipofat_descricao;

        $query = "select formapag.*, tipopag_descricao, contatesoura_descricao, banco_descricao from formapag left join tipopag on formapag_tipopagid=tipopag_id left join banco on formapag_bancoid=banco_id left join contatesoura on formapag_contatesouraid=contatesoura_id where formapag_fatid='".$id."' ";

        $formapag = DB::select($query);

        $delete = 1;
        $route  = "fats";
        $id     = $tipofat->tipofat_id;

        return view('fat.frmfat', compact('fat', 'fatitem','tipofat', 'cli', 'title', "ccusto", "arm", "vend", "moeda", "stk", "tabiva", 'tipopag', 'banco', 'contatz', 'formapag', "route", "id",'delete'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $fat    = Fat::where('fat_id',$id)->first();
        $delete = Fat::where('fat_id', $id)->delete();      
		if($delete)
			return redirect()
                ->route('fats', $fat->fat_tipofatid)
                ->with('success',"Documento Apagado com Sucesso.");
		else
			return redirect()
					->back()
					->with('error', "Erro ao Apagar!");
    }
}
