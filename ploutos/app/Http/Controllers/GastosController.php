<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use App\models\GastosModel;

class GastosController extends Controller
{
    //
    public function add(Request $request)
    {
        $asunto = $request->asunto;
        $cantidad = $request->cantidad;

        DB::table('gastos')->insert([
            'concepto' => $asunto, 
            'cantidad' => $cantidad, 
            'created_at' => Carbon::now()->toDateTimeString(), 
            'updated_at' => Carbon::now()->toDateTimeString()
        ]);

        return redirect('/home');
    }


    public function delete(GastosModel $id)
    {
        $id->delete();
        return redirect()->route('home');
    }
}
