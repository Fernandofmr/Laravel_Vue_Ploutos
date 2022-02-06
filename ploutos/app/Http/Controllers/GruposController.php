<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use App\models\GastosModel;

class GruposController extends Controller
{
    //
    public function add(Request $request)
    {        

        DB::table('groupoperation')->insert([
            'userid' => $request->userid, 
            'name' => $request->asunto, 
            'created_at' => Carbon::now()->toDateTimeString(), 
            'updated_at' => Carbon::now()->toDateTimeString()
        ]);

        return redirect('/home');
    }


    public function delete(IngresosModel $id)
    {
        $id->delete();
        return redirect()->route('home');
    }
}
