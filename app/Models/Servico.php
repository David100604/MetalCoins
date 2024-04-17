<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Servico extends Model
{
    public $timestamps = false;

    protected $primaryKey = 'servico_id';
    protected $table = 'servicos';
    protected $foreignKey = 'item_id';
    protected $fillable = ['provedor','item_id'];

    use HasFactory;

    public function itens()
    {
        return $this->belongsTo(Item::class, 'servico_id' );
    }
}