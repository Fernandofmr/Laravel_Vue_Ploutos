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

        if ($request->grupo_nuevo == '') {
            $grupo = $request->grupo;

        }else {
            $grupo = $request->grupo_nuevo;
        }


        $groupid = DB::table('groupoperation')->where('name', '=', $grupo)
                                              ->where('userid', '=', $request->userid)
                                              ->first();
                                        
        if (isset($groupid->name)) {

            DB::table('gastos')->insert([
                'user_id' => $request->userid, 
                'groupid' => $groupid->id, 
                'concepto' => $request->asunto, 
                'cantidad' => $request->cantidad, 
                'created_at' => $date_form, 
                'updated_at' => $date_form
            ]);

        }else {

            DB::table('groupoperation')->insert([
                'userid' => $request->userid, 
                'name' => $grupo, 
                'created_at' => $date_form, 
                'updated_at' => $date_form
            ]);

            $groupid = DB::table('groupoperation')->where('name', '=', $grupo)
                                                ->where('userid', '=', $request->userid)
                                                ->first();
            //dd($groupid);
            

            DB::table('gastos')->insert([
                'user_id' => $request->userid, 
                'groupid' => $groupid->id, 
                'concepto' => $request->asunto, 
                'cantidad' => $request->cantidad, 
                'created_at' => $date_form, 
                'updated_at' => $date_form
            ]);

        }

        return redirect('/home');
    }


    public function delete(GastosModel $id)
    {
        $id->delete();
        return redirect()->route('home');
    }
}
