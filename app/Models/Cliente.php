<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;
    protected $primaryKey="id_cliente";
    protected $table = "clientes";

    protected $fillable = [
        'nome',
        'morada',
        'telefone',
        'email'
    ];

    public function encomendas() {
    	return $this->hasMany('App\Models\Encomenda', 'id_cliente');
    }

}
