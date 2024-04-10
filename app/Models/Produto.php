<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Produto extends Model
{
    public $timestamps = false;

    protected $primaryKey = 'produto_id';
    protected $table = 'produtos';
    protected $fillable = ['estoque','item_id'];
    
    use HasFactory;

    public function itens()
    {
        return $this->belongsTo(Item::class, 'produto_id' );
    }
}