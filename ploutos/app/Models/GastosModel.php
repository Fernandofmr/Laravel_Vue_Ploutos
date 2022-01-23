<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GastosModel extends Model
{
    use HasFactory;

    protected $table = 'gastos';
    protected $filiable = ['concepto', 'cantidad', 'updated_at', 'created_at'];
}
