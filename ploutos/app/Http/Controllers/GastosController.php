<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;

class GastosController extends Controller
{
    //
    public function add(Request $request)
    {
        $asunto = $request->asunto;
        $cantidad = $request->cantidad;

        DB::table('gastos')->insert([
            'concepto' => $asunto, 
            'cantidad_gastada' => $cantidad, 
            'created_at' => Carbon::now()->toDateTimeString(), 
            'updated_at' => Carbon::now()->toDateTimeString()
        ]);

        return redirect('/home');
    }
}
