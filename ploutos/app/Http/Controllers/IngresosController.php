<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use App\models\IngresosModel;

class IngresosController extends Controller
{
    //
    public function add(Request $request)
    {
        if ($request->date) {
            $date_form = $request->date;
        
        }else {
            $date_form = Carbon::now()->toDateTimeString();
        }
        

        DB::table('ingresos')->insert([
            'user_id' => $request->userid, 
            'concepto' => $request->asunto, 
            'cantidad' => $request->cantidad, 
            'created_at' => $date_form, 
            'updated_at' => $date_form
        ]);

        return redirect('/home');
    }


    public function delete(IngresosModel $id)
    {
        $id->delete();
        return redirect()->route('home');
    }
}
