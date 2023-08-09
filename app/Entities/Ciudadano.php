<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class Ciudadano extends Entity
{
    protected $attributes = [
        'dpi' => null,
        'apellido' => null,
        'nombre' => null,
        'direccion' => null,
        'tel_casa' => null,
        'tel_movil' => null,
        'email' => null,
        'fechanac' => null,
        'cod_nivel_acad' => null,
        'cod_muni' => null,
        'contra' => null,
    ];
}
