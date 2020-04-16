<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class DatosFinca extends Model
{
    protected $table = 'datos_finca';
    protected $primaryKey = 'id_datos_finca';
    public $incrementing = false;
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_usuario',
        'id_variedad',
        'semana',
        'ciclo_anno',
        'area',
        'tallos',
        'cajas',
        'calibre',
        'venta',
        'fecha_registro',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'id_datos_finca'
    ];

}
