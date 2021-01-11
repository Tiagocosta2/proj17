<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Encomenda extends Model
{
    use HasFactory;
    protected $primaryKey="id_encomenda";
    protected $table = "encomendas";    

    protected $fillable = [
        'id_cliente',
        'id_vendedor',
        'data',
        'observacoes'
    ];

    public function clientes() {
    	return $this->belongsTo('App\Models\Cliente', 'id_cliente');
    }
    public function vendedores() {
    	return $this->belongsTo('App\Models\Vendedor', 'id_vendedor');
    }
        public function produtos () {
    	return $this->belongsToMany(
    		'App\Models\Produto',
    		'encomendas_produtos',
    		'id_encomenda',
    		'id_produto'
    	)->withTimestamps();
    }
}
