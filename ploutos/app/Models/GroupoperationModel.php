<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupoperationModel extends Model
{
    use HasFactory;

    protected $table = 'groupoperation';
    protected $filiable = ['id', 'userid', 'name'];

    public function user() {
        return $this->belongsTo(User::class, 'id');
    }
}
