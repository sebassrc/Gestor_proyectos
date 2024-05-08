<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model
{
    use HasFactory;
    protected $table      = "proyectos";
    protected $primaryKey = "id";


    // En el modelo Proyecto.php
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
