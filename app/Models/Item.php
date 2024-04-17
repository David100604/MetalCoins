<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Item extends Model
{
    public $timestamps = false;

    protected $primaryKey = 'item_id';
    protected $table = 'itens';
    protected $fillable = ['nome', 'descricao', 'valor', 'tipo_pedido'];
    use HasFactory;

    public function produtos() {
        
        return $this->hasOne(Produto::class, 'item_id');
    }

    public function servicos() {
        
        return $this->hasOne(Servico::class, 'item_id');
    }
}