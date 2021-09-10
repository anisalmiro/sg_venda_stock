<?php
namespace App\Http\Controllers;

use DB;
use App\Models\Stk;
use App\Models\Tabiva;
use App\Models\Grupo;
use App\Models\Unimed;
use App\Models\Arm;
use App\Models\Marca;
use App\Models\Tabpreco;
use App\Models\Fatitem;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class StkController extends Controller
{
	public function index() {
		return view('stk.lista');
	}

	public function getproductoservico() {
		$stk = Stk::all();
		return DataTables::of($stk)
			->addColumn("action", function($stk) {
				$ver = '<a href="'.route("stk.edit", $stk->stk_id).'" class="btn btn-xs btn-primary" title="Editar"><i class="fa fa-pencil"></i></a>';
				$apagar = ' <a href="'.route("stk.delete",$stk->stk_id).'" class="btn btn-xs btn-danger" title="Apagar"><i class="fa fa-trash"></i></a>';
				return $ver.$apagar;
			})
			->editColumn("stk_tabivaid", function($stk) {
				return Tabiva::find($stk->stk_tabivaid)->tabiva_descricao;
			})
			->editColumn("stk_servico", function($stk) {
				return ($stk->stk_servico) ? "Serviço" : "Artigo";
			})
			->editColumn("stk_datacriacao", function($stk) {
				return date("d-m-Y h:i:s", strtotime($stk->stk_datacriacao));
			})
		->make();
	}

	public function create() {
		$marca  = Marca::all();
		$arm    = Arm::all();
		$grupo  = Grupo::all();
		$unimed = Unimed::all();
		$tabiva = Tabiva::all();
		$route  = "stk";
		$title  = "Cadastrar Artigo/Serviço";

		return view('stk.frmstk', compact('arm', 'grupo', 'unimed', 'tabiva', 'marca', 'route', 'title'));
	}

	public function store(Request $request) {
        $itens =array();
		$data  = $request->except(['_token', 'tabpreco_codigo', 'tabpreco_preco', 'tabpreco_ivainc']);
		$item  = $request->all();
		
		$data['stk_id'] = DB::select('SELECT UPPER(LEFT(uuid(), 15)) id')[0]->id;
		$data['stk_datacriacao'] = date('Y-m-d h:i:s');
		$data['stk_dataactualizacao'] = date('Y-m-d h:i:s');
		$data['stk_servico'] = (isset($data['stk_servico'])) ? 1 : 0;

        DB::beginTransaction();

		$insert   = Stk::create($data);
		$insItens = true;

        if(isset($item['tabpreco_codigo'])){
            for ($i=0; $i <count($item['tabpreco_codigo']) ; $i++) {
                $itens[$i] = [
                    'tabpreco_id'               => DB::select('SELECT UPPER(LEFT(uuid(), 15)) id')[0]->id,
                    'tabpreco_stkid'            => $data['stk_id'],
                    'tabpreco_codigo'           => $item['tabpreco_codigo'][$i],
                    'tabpreco_preco'            => $item['tabpreco_preco'][$i],
                    'tabpreco_datacriacao'      => date('Y-m-d h:i:s'),
					'tabpreco_dataactualizacao' => date('Y-m-d h:i:s'),
					'tabpreco_ivainc'           => (isset($item['tabpreco_ivainc'][$i])) ? 1 : 0,
                ];
                $insItens = Tabpreco::create($itens[$i]);
            }
        }

		if($insert && $insItens) {
            DB::commit();
			return redirect()->route("stk")->with('success', 'Artigo Inserido com Sucesso');
		}else{
            DB::rollBack();
            return redirect()->back()->with('error', 'Falha ao inserir artigo');
        }
		
	}

	public function edit($id) {
		$stk      = Stk::where('stk_id', $id)->first();
		$marca    = Marca::all();
		$arm      = Arm::all();
		$grupo    = Grupo::all();
		$unimed   = Unimed::all();
		$tabiva   = Tabiva::all();
		$tabpreco = Tabpreco::where('tabpreco_stkid',$id)->orderBy('tabpreco_codigo')->get();
		$route    = "stk";
		$title    = "Editar Artigo/Serviço";

		return view('stk.frmstk', compact('stk', 'arm', 'grupo', 'unimed', 'tabiva', 'marca', 'tabpreco', 'route', 'title'));
	}

	public function update(Request $request, $id) {

		$itens  =array();
		$itensl =array();
		$data   = $request->except(['_method','_token', 'tabpreco_codigo', 'tabpreco_preco', 'tabpreco_ivainc', 'tabpreco_codigol', 'tabpreco_precol', 'tabpreco_ivaincl', 'tabpreco_id']);
		$item   = $request->only(['tabpreco_codigo', 'tabpreco_preco', 'tabpreco_ivainc']);
		$iteml  = $request->only(['tabpreco_codigol', 'tabpreco_precol', 'tabpreco_ivaincl', 'tabpreco_id']);
	
		$data['stk_dataactualizacao'] = date('Y-m-d h:i:s');
		$data['stk_servico'] = (isset($data['stk_servico'])) ? 1 : 0;

        DB::beginTransaction();

		$insert    = Stk::where('stk_id',$id)->update($data);
		$insItens  = true;
		$insItensl = true;

        if(isset($item['tabpreco_codigo'])){
            for ($i=0; $i <count($item['tabpreco_codigo']) ; $i++) {
                $itens[$i] = [
                    'tabpreco_id'               => DB::select('SELECT UPPER(LEFT(uuid(), 15)) id')[0]->id,
                    'tabpreco_stkid'            => $id,
                    'tabpreco_codigo'           => $item['tabpreco_codigo'][$i],
                    'tabpreco_preco'            => $item['tabpreco_preco'][$i],
                    'tabpreco_datacriacao'      => date('Y-m-d h:i:s'),
					'tabpreco_dataactualizacao' => date('Y-m-d h:i:s'),
					'tabpreco_ivainc'           => (isset($item['tabpreco_ivainc'][$i])) ? 1 : 0,
                ];
                $insItens = Tabpreco::create($itens[$i]);
            }
        }

        if(isset($iteml['tabpreco_codigol'])){
            for ($i=0; $i <count($iteml['tabpreco_codigol']) ; $i++) {
                $itensl[$i] = [
                    'tabpreco_codigo'           => $iteml['tabpreco_codigol'][$i],
                    'tabpreco_preco'            => $iteml['tabpreco_precol'][$i],
					'tabpreco_ivainc'           => (isset($iteml['tabpreco_ivaincl'][$i])) ? 1 : 0,
					'tabpreco_dataactualizacao' => date('Y-m-d h:i:s'),
                ];
                $insItensl = Tabpreco::where('tabpreco_id',$iteml['tabpreco_id'][$i])->update($itensl[$i]);
            }
        }

		if($insert && $insItens && $insItensl) {
			DB::commit();
			return redirect()->route("stk")->with('success', 'Artigo Atualizado com Sucesso');
		}else{
			DB::rollBack();
			return redirect()->back()->withError('error', 'Falha ao atualizar artigo');
		}		
	}

	public function delete($id){	
		$stk = Stk::where('stk_id', $id)->first();

		$marca    = Marca::all();
		$arm      = Arm::all();
		$grupo    = Grupo::all();
		$unimed   = Unimed::all();
		$tabiva   = Tabiva::all();
		$tabpreco = Tabpreco::where('tabpreco_stkid',$id)->orderBy('tabpreco_codigo')->get();
		$findst   = Fatitem::where('fatitem_stkid',$id)->first();
		$route    = "stk";
		$title    = "Apagar Artigo/Serviço";
		if($findst==null){
			$delete = 1;
			return view('stk.frmstk', compact('delete','stk', 'arm', 'grupo', 'unimed', 'tabiva', 'marca', 'tabpreco', 'route', 'title'));
		}else{
			return redirect()->back()->with('error', 'Não pode apagar este artigo. Tem movimentos associados!');
		}		
	}

	 public function destroy($id)
    {
        $delete = Stk::where('stk_id', $id)->delete();      
		if($delete)
			return redirect()
					->route('stk')
					->with('success',"Artigo/Serviço Apagado com Sucesso!");
		else
			return redirect()
					->back()
					->with('error', "Erro ao Apagar!");
    }
}