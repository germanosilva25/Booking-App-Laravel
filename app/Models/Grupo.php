<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{

    protected $table = 'grupos';

    protected $primaryKey = 'id_grupo';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nome_grupo',
    ];

    public function usuario()
    {
        return $this->hasMany(User::class, 'id_grupo', 'id_grupo');
    }


}
