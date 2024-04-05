<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfessorDisciplina extends Model
{

    Protected $table = 'nome';
    protected $fillable = ['disciplina'];

    use HasFactory;
}
