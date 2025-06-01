<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servico extends Model
{

    protected $table = 'servicos';

    protected $primaryKey = 'id_servico';

    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nome_servico',
        'valor',
    ];

    public function usuario()
    {
        return $this->belongsTo(User::class, 'id_usuario', 'id_usuario');
    }

    // https://localhost/agendamentos/create-usuario?nome=Cassio&email=cassio@mail.com&id_grupo=5&data_nascimento=2000-02-28&data_criacao=2025-05-16&senha=Jjn98eu9jUIJH989hu
}
