<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Professor extends Model
{
   protected $table = 'professores';
   protected $fillable = ['nome'];
   
    use HasFactory;

    public function disciplinas(): hasManyTrough
    {
       return $this->hasManyTrough(Disciplinas::class,ProfessorDisciplina::class);

    }
}
