<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use App\Models\IngresosModel;
use App\Models\GastosModel;
use App\Models\GroupoperationModel;

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

        $user = Auth::user();
        $actual_month = date('m');
        $actual_year = date('Y');
        $month_order_array = [];

        $ingresos_meses = array();
        $gastos_meses = array();
        $ingresos_total_ultimo_agno = 0;
        $gastos_total_ultimo_agno = 0;

        $lista_ingresos = IngresosModel::with('groups')
                            ->where('user_id', '=', $user->id)
                            ->get();
        
        $lista_gastos = GastosModel::with('groups')
                            ->where('user_id', '=', $user->id)
                            ->get();
        //$lista_ingresos = DB::table('ingresos')->where('user_id', '=', $user->id)->get();
        //$lista_gastos = DB::table('gastos')->where('user_id', '=', $user->id)->get();
        $lista_grupos = DB::table('groupoperation')->where('userid', '=', $user->id)->get();

        $i_value=($actual_month + 12);
        $month_consult = 0;
        $support = $actual_month;
        // Almacenamiento de datos meses
        for ($i=$i_value; $i > $actual_month; $i--) { 
            $month_valid = $i;
            
            if ($month_valid > 12){
                $month_valid = $support;
                $support --;
            }

            if ($month_consult == $month_valid) {
                $month_valid --;
            }

            $from = date($actual_year . '-' . $month_valid . '-01');
            $to = date($actual_year . '-' . $month_valid . '-31');

            $ingresos_mes = IngresosModel::whereBetween('updated_at', [$from, $to])->get();

            if (isset($ingresos_mes[0])){
                $ingresos_total_ultimo_agno += $ingresos_mes[0]->cantidad;
            }            
            
            if (!$ingresos_mes) {
                $ingreso_mes = array('', 0, ''); 
            }

            array_push($ingresos_meses, $ingresos_mes);

            $gastos_mes = GastosModel::whereBetween('updated_at', [$from, $to])->get(); 

            if(isset($gastos_mes[0])){
                $gastos_total_ultimo_agno += $gastos_mes[0]->cantidad;
            }            
            
            if (!$gastos_mes) {
                $gastos_mes = array('', 0, '');    
            }

            array_push($gastos_meses, $gastos_mes);

            switch ($month_valid) {
                case 1:
                    array_push($month_order_array, 'Enero -' . substr($actual_year, 2));
                    break;
                case 2:
                    array_push($month_order_array, 'Febrero -' . substr($actual_year, 2));
                    break;
                case 3:
                    array_push($month_order_array, 'Marzo -' . substr($actual_year, 2));
                    break;
                case 4:
                    array_push($month_order_array, 'Abril -' . substr($actual_year, 2));
                    break;
                case 5:
                    array_push($month_order_array, 'Mayo -' . substr($actual_year, 2));
                    break;
                case 6:
                    array_push($month_order_array, 'Junio -' . substr($actual_year, 2));
                    break;
                case 7:
                    array_push($month_order_array, 'Julio -' . substr($actual_year, 2));
                    break;
                case 8:
                    array_push($month_order_array, 'Agosto -' . substr($actual_year, 2));
                    break;
                case 9:
                    array_push($month_order_array, 'Septiembre -' . substr($actual_year, 2));
                    break;
                case 10:
                    array_push($month_order_array, 'Octubre -' . substr($actual_year, 2));
                    break;
                case 11:
                    array_push($month_order_array, 'Noviembre -' . substr($actual_year, 2));
                    break;
                case 12:
                    array_push($month_order_array, 'Diciembre -' . substr($actual_year, 2));
                    break;
                
                default:
                    # 
                    break;
            }
            
            $month_consult = $month_valid;

            if ($support == 0) {
                $actual_year --;
                $support = date('m');
            }
            
        }   

        return view('home', compact('nav', 'lista_ingresos', 'lista_gastos', 'lista_grupos', 'ingresos_meses', 'gastos_meses', 'user', 
                    'month_order_array', 'ingresos_total_ultimo_agno', 'gastos_total_ultimo_agno'));
    }

}
