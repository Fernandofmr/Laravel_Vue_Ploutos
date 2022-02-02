<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IngresosModel extends Model
{
    use HasFactory;

    protected $table = 'ingresos';
    protected $filiable = ['userid', 'concepto', 'cantidad', 'updated_at', 'created_at'];
}
