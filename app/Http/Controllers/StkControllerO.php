<?php

namespace App\Http\Controllers;
use DB;
use Yajra\Datatables\Datatables;
use App\Models\Stk;

use Illuminate\Http\Request;

class StkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('stk.lista');
    }

    public function getStoques()
    {
        $query = "select stk_referencia, stk_descricao, stk_servico, tabiva_descricao, grupo_descricao, stk_id from stk left join tabiva on stk_tabivaid=tabiva_id left join grupo on stk_grupoid=grupo_id order by stk_descricao";

        $stk = DB::select($query);

        return Datatables::of($stk)->addColumn('action', function ($u) {

            $ver = '<a href="'.route("stoque.show",$u->stk_id).'" class="btn btn-xs btn-primary" title="Visualizar"><i class="fa fa-eye"></i></a>';

            $editar = ' <a href="'.route("stoque.edit",$u->stk_id).'" class="btn btn-xs btn-primary" title="Editar"><i class="fa fa-pencil"></i></a>';

            $apagar = ' <a href="'.route("stoque.delete",$u->stk_id).'" class="btn btn-xs btn-danger" title="Apagar"><i class="fa fa-trash"></i></a>';

            $link = $ver.$editar.$apagar;

            return $link;
        })->removeColumn('stk_id')->make();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    public function delete($id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
