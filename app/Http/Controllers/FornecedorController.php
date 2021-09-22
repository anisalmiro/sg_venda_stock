<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Yajra\Datatables\Datatables;
use App\Models\Fnc;
use Redirect;


class FornecedorController extends Controller
{
    public function index()
    	{
    		return view('fornecedor.lista');
    	}


    	//LISTA DE fornecedors
    	public function getfornecedores()
    	{
    		$query = "select * from fnc";

    		$fornecedor = DB::select($query);

    		return Datatables::of($fornecedor)->addColumn('action', function ($u) {

    			$ver = '<a href="'.route("fornecedor.show",$u->idfnc).'" class="btn btn-xs btn-primary" title="Visualizar"><i class="fa fa-eye"></i></a>';

    			$editar = ' <a href="'.route("fornecedor.edit",$u->idfnc).'" class="btn btn-xs btn-primary" title="Editar"><i class="fa fa-pencil"></i></a>';

    			$apagar = ' <a href="'.route("fornecedor.delete",$u->idfnc).'" class="btn btn-xs btn-danger" title="Apagar"><i class="fa fa-trash"></i></a>';

    			$link = $ver.$editar.$apagar;

    			return $link;
    		})->removeColumn('idfnc')->make();
    	}
    	/**
    	 * Show the form for creating a new resource.
    	 *
    	 * @return \Illuminate\Http\Response
    	 */
    	public function create()
    	{
    		$title   = "Cadastrar fornecedor";
    		$fnc     = Fnc::orderBy("fnc_numero","desc")->first();
    		$nome    = Fnc::orderBy("nome")->get();
    		$morada  = Fnc::orderBy("morada")->get();
    		$telefone= Fnc::orderBy("telefone")->get();
    		$telefone= Fnc::orderBy("celular")->get();
    		$email   = Fnc::orderBy("email")->get();
    		$nuit    = Fnc::orderBy("nuit")->get();
    		if($fnc == null)
    			$numero = 1;
    		else
    			$numero = $fnc->fnc_numero + 1;

    		return view('fornecedor.frmfornecedor', compact("numero", "nome", "morada", "telefone", "email", "nuit", "title"));
    	}

    	/**
    	 * Store a newly created resource in storage.
    	 *
    	 * @param  \Illuminate\Http\Request  $request
    	 * @return \Illuminate\Http\Response
    	 */
    	public function store(Request $request)
    	{

    		$insert = Fnc::create([
    		'idfnc'=>DB::select('SELECT UPPER(LEFT(uuid(), 15)) AS id')[0]->id,
    		 'fnc_numero'   =>$request['fnc_numero'],
    		 'nome'   =>$request['fnc_nome'],
             'morada'   =>$request['fnc_morada'],
             'telefone'   =>$request['fnc_telefone'],
             'celular'   =>$request['fnc_celular'],
             'email'   =>$request['fnc_email'],
             'nuit'   =>$request['fnc_nuit'],
             ]);
    		if($insert) {
    		    return redirect('/fornecedor')->with( 'success', 'Actualisado com sucesso' );

    		} else {
    		return redirect('/fornecedor')->with( "error", "Erro ao Gravar o fornecedor" );
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
    		$title   = "Visualizar Fornecedor";
    		$fnc     = Fnc::orderBy("idfnc","desc")->first();
            $nome = Fnc::orderBy("nome")->get();
            $morada    = Fnc::orderBy("morada")->get();
            $telefone  = Fnc::orderBy("telefone")->get();
            $email     = Fnc::orderBy("email")->get();
            $nuit    = Fnc::orderBy("nuit")->get();
    		$show    = 1;

    		return view('fornecedor.frmfornecedor', compact("fnc", "nome", "morada", "telefone", "email", "nuit", "title"));
    	}

    	/**
    	 * Show the form for editing the specified resource.
    	 *
    	 * @param  int  $id
    	 * @return \Illuminate\Http\Response
    	 */
    	public function edit($id)
    	{
    		$title   = "Editar fornecedor";
    		$fnc     = Fnc::orderBy("idfnc","desc")->first();
            $nome = Fnc::orderBy("nome")->get();
            $morada    = Fnc::orderBy("morada")->get();
            $telefone  = Fnc::orderBy("telefone")->get();
            $email     = Fnc::orderBy("email")->get();
            $nuit    = Fnc::orderBy("nuit")->get();

    		return view('fornecedor.frmfornecedor', compact("fnc", "nome", "morada", "telefone", "email", "nuit", "title"));
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
    		if(isset($data['fnc_prontopag']) && ($data['fnc_prontopag']=='on'))
    			$data['fnc_prontopag'] = 1;
    		else
    			$data['fnc_prontopag'] = 0;

    		if(isset($data['fnc_ivaincluido']) && ($data['fnc_ivaincluido']=='on'))
    			$data['fnc_ivaincluido'] = 1;
    		else
    			$data['fnc_ivaincluido'] = 0;

    		if(isset($data['fnc_ivaisento']) && ($data['fnc_ivaisento']=='on'))
    			$data['fnc_ivaisento'] = 1;
    		else
    			$data['fnc_ivaisento'] = 0;

    		$insert = fnc::where('idfnc', $id)->update($data);
    		if($insert){
    			return redirect()
    					->route('fornecedors')
    					->with("success", "fornecedor Atualizado Com Sucesso");
    		}else{
    			return redirect()
    					->back()
    					->with("error", "Erro ao Atualizar o fornecedor");
    		}
    	}

    	public function delete($id)
    	{
    		$title   = "Apagar fornecedor";
    		$fnc      = fnc::where("idfnc", $id)->first();
    		$fnc     = Fnc::orderBy("idfnc")->first();
            $nome = Fnc::orderBy("nome")->get();
            $morada    = Fnc::orderBy("morada")->get();
            $telefone  = Fnc::orderBy("telefone")->get();
            $email     = Fnc::orderBy("email")->get();
            $nuit    = Fnc::orderBy("nuit")->get();
    		$del     = 1;

    		return view('fornecedor.frmfornecedor', compact("fnc", "nome", "morada", "telefone", "email", "nuit", "del", "title"));
    	}

    	/**
    	 * Remove the specified resource from storage.
    	 *
    	 * @param  int  $id
    	 * @return \Illuminate\Http\Response
    	 */
    	public function destroy($id)
    	{
    		$delete = fnc::where('idfnc', $id)->delete();
    		if($delete)
    			return redirect()
    					->route('fornecedor')
    					->with('success',"fornecedor Apagado com Sucesso!");
    		else
    			return redirect()
    					->back()
    					->with('error', "Erro ao Apagar!");
    	}
}
