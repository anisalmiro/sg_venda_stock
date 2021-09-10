<?php
namespace App\Http\Controllers;

use DB;
use App\Models\Stk;
use App\Models\Tabiva;
use App\Models\Grupo;
use App\Models\Unimed;
use App\Models\Arm;
use App\Models\Marca;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class ProductoServicoController extends Controller
{
	public function index() {
		return view('stk.lista');
	}

	public function getproductoservico() {
		$stk = Stk::all();
		return DataTables::of($stk)
			->addColumn("action", function($stk) {
				$ver = '<a href="'.route("stk.edit", $stk->stk_id).'" class="btn btn-xs btn-primary" title="Editar"><i class="fa fa-pencil"></i></a>';
				return $ver;
			})
			->editColumn("stk_armazemid", function($stk) {
				return Arm::find($stk->stk_armazemid)->arm_descricao;
			})
			->editColumn("stk_marcaid", function($stk) {
				return Marca::find($stk->stk_marcaid)->marca_descricao;
			})
			->editColumn("stk_servico", function($stk) {
				return ($stk->stk_servico) ? "Serviço" : "Producto";
			})
			->editColumn("stk_datacriacao", function($stk) {
				return date("d-m-Y h:i:s", strtotime($stk->stk_datacriacao));
			})
		->make();
	}

	public function create() {

		$marca = Marca::all();
		$arm = Arm::all();
		$grupo = Grupo::all();
		$unimed = Unimed::all();
		$tabiva = Tabiva::all();

		return view('stk.frmstk', compact('arm', 'grupo', 'unimed', 'tabiva', 'marca'));
	}

	public function store(Request $request) {

		$data = $request->except(['_token']);

		$filename = null;
		if($file = $request->file('stk_imagem')) {

			$filename = md5(time().$file->getClientOriginalName()).".".$file->getClientOriginalExtension();

			if($file->isValid() and $file->move(__DIR__.'/../../../public/files/uploads/', $filename)) {
				$data['stk_imagem'] = $filename;
			} else {
				$filename = null;
			}
		}
		
		$data['stk_id'] = DB::select('SELECT UPPER(LEFT(uuid(), 15))')[0];
		$data['stk_datacriacao'] = date('Y-m-d h:i:s');
		$data['stk_dataactualizacao'] = date('Y-m-d h:i:s');
		
		$data['stk_usalote'] = (isset($data['stk_usalote'])) ? 1 : 0;
		$data['stk_usadesctecnica'] = (isset($data['stk_usadesctecnica'])) ? 1 : 0;
		$data['stk_pos'] = (isset($data['stk_pos'])) ? 1 : 0;
		$data['stk_negativo'] = (isset($data['stk_negativo'])) ? 1 : 0;
		$data['stk_servico'] = (isset($data['stk_servico'])) ? 1 : 0;
		$data['stk_avisanegativo'] = (isset($data['stk_avisanegativo'])) ? 1 : 0;

		if(!$data['stk_pos']) { unset($data['stk_descricaopos']); }
		if(!$data['stk_usadesctecnica']) { unset($data['stk_desctecnica']); }
		if(!$filename) { unset($data['stk_imagem']); }


		if($result = Stk::create($data)) {
			return redirect()->route("stk")->with('message', 'Adicionado com sucesso');
		}
		return redirect()->route("stk")->withError('error', 'Falha ao adicionar dados');
	}

	public function edit($id) {

		$stk = Stk::where('stk_id', $id)->first();

		$marca = Marca::all();
		$arm = Arm::all();
		$grupo = Grupo::all();
		$unimed = Unimed::all();
		$tabiva = Tabiva::all();

		return view('producto_servico.frmproducto_servico', compact('stk', 'arm', 'grupo', 'unimed', 'tabiva', 'marca'));
	}

	public function update(Request $request, $id) {

		$data = $request->except(['_method', '_token']);

		$filename = null;
		if($file = $request->file('stk_imagem')) {

			$filename = md5(time().$file->getClientOriginalName()).".".$file->getClientOriginalExtension();

			if($file->isValid() and $file->move(__DIR__.'/../../../public/files/uploads/', $filename)) {
				$data['stk_imagem'] = $filename;
			} else {
				$filename = null;
			}
		}
		$data['stk_datacriacao'] = date('Y-m-d h:i:s');
		$data['stk_dataactualizacao'] = date('Y-m-d h:i:s');
		
		$data['stk_usalote'] = (isset($data['stk_usalote'])) ? 1 : 0;
		$data['stk_usadesctecnica'] = (isset($data['stk_usadesctecnica'])) ? 1 : 0;
		$data['stk_pos'] = (isset($data['stk_pos'])) ? 1 : 0;
		$data['stk_negativo'] = (isset($data['stk_negativo'])) ? 1 : 0;
		$data['stk_servico'] = (isset($data['stk_servico'])) ? 1 : 0;
		$data['stk_avisanegativo'] = (isset($data['stk_avisanegativo'])) ? 1 : 0;

		if(!$data['stk_pos']) { unset($data['stk_descricaopos']); }
		if(!$data['stk_usadesctecnica']) { unset($data['stk_desctecnica']); }
		if(!$filename) { unset($data['stk_imagem']); }


		if($result = Stk::where('stk_id', $id)->update($data)) {
			return redirect()->route("stk")->with('message', 'Adicionado com sucesso');
		}
		return redirect()->route("stk")->withError('error', 'Falha ao adicionar dados');
	}
}