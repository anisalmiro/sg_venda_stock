<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Models\Tabpreco;
use App\Models\Stk;
use App\Models\Tipopag;
use App\Models\Contatesoura;
use App\Models\Banco;

class MainController extends Controller
{
    public function getPreco($stkid){
        $tabpreco = null;
        $tabp = Tabpreco::where('tabpreco_stkid',$stkid)->orderBy('tabpreco_codigo')->first();
        if($tabp!=null)
            $tabpreco = $tabp->toJSON();
        else
            $tabpreco = 1;
        return $tabpreco;
    }

    public function getStk($stkid){
        $getStk = Stk::where('stk_id',$stkid)->first()->toJSON();
        return $getStk;
    }

    public function getTipopag($id){
        $get = Tipopag::where('tipopag_id',$id)->first()->toJSON();
        return $get;
    }

    public function getBanco($id){
        $get = Banco::where('banco_id',$id)->first()->toJSON();
        return $get;
    }

    public function getContatesoura($id){
        $get = Contatesoura::where('contatesoura_id',$id)->first()->toJSON();
        return $get;
    }
}
