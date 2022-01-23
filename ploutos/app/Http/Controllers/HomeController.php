<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $nav = 0;

        $lista_ingresos = DB::table('ingresos')->select('id', 'concepto', 'cantidad', 'updated_at')->get();
        $lista_gastos = DB::table('gastos')->select('id', 'concepto', 'cantidad', 'updated_at')->get();

        return view('home', compact('nav', 'lista_ingresos', 'lista_gastos'));
    }

}
