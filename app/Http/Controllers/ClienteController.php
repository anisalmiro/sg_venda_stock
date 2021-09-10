<?php

namespace App\Http\Controllers;
use DB;
use Yajra\Datatables\Datatables;
use App\Models\Cli;
use App\Models\Tipocli;
use App\Models\Pais;
use App\Models\Cencusto;
use App\Models\Arm;
use App\Models\Vend;
use App\Models\Moeda;
use App\Models\Condpag;

use Illuminate\Http\Request;

class ClienteController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		return view('cliente.lista');
	}
	//LISTA DE CLIENTES
	public function getClientes()
	{
		$query = "select cli_numero, cli_nome, cli_morada, cli_telefone, cli_celular, cli_email, cli_nuit, cli_estado, cli_id from cli order by cli_nome ";

		$cliente = DB::select($query);

		return Datatables::of($cliente)->addColumn('action', function ($u) {

			$ver = '<a href="'.route("cliente.show",$u->cli_id).'" class="btn btn-xs btn-primary" title="Visualizar"><i class="fa fa-eye"></i></a>';

			$editar = ' <a href="'.route("cliente.edit",$u->cli_id).'" class="btn btn-xs btn-primary" title="Editar"><i class="fa fa-pencil"></i></a>';

			$apagar = ' <a href="'.route("cliente.delete",$u->cli_id).'" class="btn btn-xs btn-danger" title="Apagar"><i class="fa fa-trash"></i></a>';

			$link = $ver.$editar.$apagar;

			return $link;
		})->removeColumn('cli_id')->make();
	}
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		$title   = "Cadastrar Cliente";
		$cli     = Cli::orderBy("cli_numero","desc")->first();
		$tipocli = Tipocli::orderBy("tipocli_descricao")->get();
		$pais    = Pais::orderBy("pais_descricao")->get();
		$ccusto  = Cencusto::orderBy("cencusto_descricao")->get();
		$arm     = Arm::orderBy("arm_descricao")->get();
		$vend    = Vend::orderBy("vend_nome")->get();
		$moeda   = Moeda::orderBy("moeda_sigla")->get();
		$condpag = Condpag::orderBy("condpag_id")->get();
		if($cli == null)
			$numero = 1;
		else
			$numero = $cli->cli_numero + 1;

		return view('cliente.frmcliente', compact("numero", "tipocli", "pais", "ccusto", "arm", "vend", "moeda", "condpag", "title"));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$data = $request->all();
		$data['cli_id'] = DB::select('SELECT UPPER(LEFT(uuid(), 15)) AS id')[0]->id;
		if(isset($data['cli_prontopag']) && ($data['cli_prontopag'] == 'on'))
			$data['cli_prontopag'] = 1;
		else
			$data['cli_prontopag'] = 0;
		if(isset($data['cli_ivaincluido']) && ($data['cli_ivaincluido'] == 'on'))
			$data['cli_ivaincluido'] = 1;
		else
			$data['cli_ivaincluido'] = 0;
		if(isset($data['cli_ivaisento']) && ($data['cli_ivaisento']=='on'))
			$data['cli_ivaisento'] = 1;
		else
			$data['cli_ivaisento'] = 0;
		$insert = Cli::create($data);
		if($insert) {
			return redirect()->route('clientes')->with("success", "Cliente Cadastrado Com Sucesso");
		} else {
			return redirect()->back()->with("error", "Erro ao Gravar o Cliente");
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
		$title   = "Visualizar Cliente";
		$cl      = Cli::where("cli_id", $id)->first();
		$tipocli = Tipocli::orderBy("tipocli_descricao")->get();
		$pais    = Pais::orderBy("pais_descricao")->get();
		$ccusto  = Cencusto::orderBy("cencusto_descricao")->get();
		$arm     = Arm::orderBy("arm_descricao")->get();
		$vend    = Vend::orderBy("vend_nome")->get();
		$moeda   = Moeda::orderBy("moeda_sigla")->get();
		$condpag = Condpag::orderBy("condpag_id")->get();
		$show    = 1;

		return view('cliente.frmcliente', compact("cl", "tipocli", "pais", "ccusto", "arm", "vend", "moeda", "condpag", "show", "title"));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		$title   = "Editar Cliente";
		$cl      = Cli::where("cli_id",$id)->first();
		$tipocli = Tipocli::orderBy("tipocli_descricao")->get();
		$pais    = Pais::orderBy("pais_descricao")->get();
		$ccusto  = Cencusto::orderBy("cencusto_descricao")->get();
		$arm     = Arm::orderBy("arm_descricao")->get();
		$vend    = Vend::orderBy("vend_nome")->get();
		$moeda   = Moeda::orderBy("moeda_sigla")->get();
		$condpag = Condpag::orderBy("condpag_id")->get();

		return view('cliente.frmcliente', compact("cl", "tipocli", "pais", "ccusto", "arm", "vend", "moeda", "condpag", "title"));
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
		$data = $request->except("_method", "_token");
		if(isset($data['cli_prontopag']) && ($data['cli_prontopag']=='on'))
			$data['cli_prontopag'] = 1;
		else
			$data['cli_prontopag'] = 0;

		if(isset($data['cli_ivaincluido']) && ($data['cli_ivaincluido']=='on'))
			$data['cli_ivaincluido'] = 1;
		else
			$data['cli_ivaincluido'] = 0;
		
		if(isset($data['cli_ivaisento']) && ($data['cli_ivaisento']=='on'))
			$data['cli_ivaisento'] = 1;
		else
			$data['cli_ivaisento'] = 0;
		
		$insert = Cli::where('cli_id', $id)->update($data);
		if($insert){
			return redirect()
					->route('clientes')
					->with("success", "Cliente Atualizado Com Sucesso");
		}else{
			return redirect()
					->back()
					->with("error", "Erro ao Atualizar o Cliente");
		}
	}

	public function delete($id)
	{
		$title   = "Apagar Cliente";
		$cl      = Cli::where("cli_id", $id)->first();
		$tipocli = Tipocli::orderBy("tipocli_descricao")->get();
		$pais    = Pais::orderBy("pais_descricao")->get();
		$ccusto  = Cencusto::orderBy("cencusto_descricao")->get();
		$arm     = Arm::orderBy("arm_descricao")->get();
		$vend    = Vend::orderBy("vend_nome")->get();
		$moeda   = Moeda::orderBy("moeda_sigla")->get();
		$condpag = Condpag::orderBy("condpag_id")->get();
		$del     = 1;

		return view('cliente.frmcliente', compact("cl", "tipocli", "pais", "ccusto", "arm", "vend", "moeda", "condpag", "del", "title"));
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		$delete = Cli::where('cli_id', $id)->delete();      
		if($delete)
			return redirect()
					->route('clientes')
					->with('success',"Cliente Apagado com Sucesso!");
		else
			return redirect()
					->back()
					->with('error', "Erro ao Apagar!");
	}
}
