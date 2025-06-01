<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{

    protected $table = 'usuarios';

    protected $primaryKey = 'id_usuario';

    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nome_usuario',
        'email',
        'id_grupo',
        'data_de_nascimento',
        'senha'
    ];

    public function grupo()
    {
        return $this->belongsTo(Grupo::class, 'id_grupo', 'id_grupo');
    }

    // https://localhost/agendamentos/create-usuario?nome=Cassio&email=cassio@mail.com&id_grupo=5&data_nascimento=2000-02-28&data_criacao=2025-05-16&senha=Jjn98eu9jUIJH989hu
    
}

