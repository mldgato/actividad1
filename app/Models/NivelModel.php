<?php

namespace App\Models;

use CodeIgniter\Model;
Use App\Entities\Nivel;

class NivelModel extends Model
{
    protected $table = 'nivelesacademicos';
    protected $primaryKey = 'cod_nivel_acad';
    protected $allowedFields = ['nombre', 'descripcion'];

    protected $returnType = Nivel::class;
}
