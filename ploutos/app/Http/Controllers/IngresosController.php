<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;

class IngresosController extends Controller
{
    //
    public function add(Request $request)
    {
        $asunto = $request->asunto;
        $cantidad = $request->cantidad;

        DB::table('ingresos')->insert([
            'concepto' => $asunto, 
            'cantidad_ingresada' => $cantidad, 
            'created_at' => Carbon::now()->toDateTimeString(), 
            'updated_at' => Carbon::now()->toDateTimeString()
        ]);

        return redirect('/home');
    }
}
