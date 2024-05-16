<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model
{
    use HasFactory;
    protected $table      = "proyectos"; 
    protected $primaryKey = "id";
    protected $fillable = ['nombre', 'titulo', 'archivo']; 
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
