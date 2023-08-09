<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Entities\Ciudadano;

class CiudadanoModel extends Model
{
    protected $table = 'ciudadanos';
    protected $primaryKey = 'dpi';
    protected $allowedFields = ['dpi', 'apellido', 'nombre', 'direccion', 'tel_casa', 'tel_movil', 'email', 'fechanac', 'cod_nivel_acad', 'cod_muni', 'contra'];

    protected $returnType = Ciudadano::class;
}
