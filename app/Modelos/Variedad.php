<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class Variedad extends Model
{
    protected $table = 'variedad';
    protected $primaryKey = 'id_variedad';
    public $incrementing = false;
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre',
        'descripcion',
        'estado',
        'fecha_registro',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'id_planta',
        'id_variedad'
    ];

    public function planta(){
        return $this->belongsTo('\App\Modelos\Planta','id_planta');
    }

    public function variedad_usuario(){
        return VariedadUsuario::where([
            ['id_variedad',$this->id_variedad],
            ['id_usuario',session('id_usuario')]
        ])->exists();
    }
}
