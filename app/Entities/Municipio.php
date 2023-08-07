<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class Municipio extends Entity
{
    protected $attributes = [
        'cod_muni' => null,
        'nombre_municipio' => null,
        'cod_depto' => null,
    ];
}
