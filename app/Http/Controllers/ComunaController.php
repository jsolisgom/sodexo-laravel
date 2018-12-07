<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Region;
use App\Comuna;

class ComunaController extends Controller
{
    public function getComunasByRegionId(Request $request){

        $id_region  = $request->get('id');
        $comunas    = Comuna::with('region')->where('region_id', $id_region)->get();

        return $comunas;

    }
}
