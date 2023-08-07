<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class Region extends Entity
{
    protected $attributes = [
        'cod_region' => null,
        'nombre' => null,
        'descripcion' => null,
    ];
}