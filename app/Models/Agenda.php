<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{

    protected $table = 'agendas';

    protected $primaryKey = 'id_agenda';

    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'horario',
        'id_usuario',
        'dia_da_semana',
    ];

    public function agendamentos()
    {
        return $this->hasMany(Agendamento::class, 'id_agenda', 'id_agenda');
    }

    public function usuario()
    {
        return $this->belongsTo(User::class, 'id_usuario', 'id_usuario');
    }

    // https://localhost/agendamentos/create-usuario?nome=Cassio&email=cassio@mail.com&id_grupo=5&data_nascimento=2000-02-28&data_criacao=2025-05-16&senha=Jjn98eu9jUIJH989hu
}
