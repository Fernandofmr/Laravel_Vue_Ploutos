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
        if ($request->date) {
            $date_form = $request->date;
        
        }else {
            $date_form = Carbon::now()->toDateTimeString();
        }

        DB::table('gastos')->insert([
            'user_id' => $request->userid, 
            'concepto' => $request->asunto, 
            'cantidad' => $request->cantidad, 
            'created_at' => $date_form, 
            'updated_at' => $date_form
        ]);

        return redirect('/home');
    }


    public function delete(GastosModel $id)
    {
        $id->delete();
        return redirect()->route('home');
    }
}
