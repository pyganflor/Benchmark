<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class Planta extends Model
{
    protected $table = 'planta';
    protected $primaryKey = 'id_planta';
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
        'id_planta'
    ];
}
