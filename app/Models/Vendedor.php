<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendedor extends Model
{
    use HasFactory;
    protected $primaryKey="id_vendedor";
    protected $table = "vendedores";

    protected $fillable = [
        'nome',
        'especialidade',
        'email'
    ];

    public function encomendas() {
    	return $this->hasMany('App\Models\Encomenda', 'id_vendedor');
    } 
}
