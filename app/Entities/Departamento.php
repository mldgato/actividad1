<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class Departamento extends Entity
{
    protected $attributes = [
        'cod_depto' => null,
        'nombre_depto' => null,
        'cod_region' => null,
    ];
}
