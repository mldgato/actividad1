<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class Nivel extends Entity
{
    protected $attributes = [
        'cod_nivel_acad' => null,
        'nombre' => null,
        'descripcion' => null,
    ];
}