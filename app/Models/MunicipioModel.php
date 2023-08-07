<?php

namespace App\Models;

use App\Entities\Municipio;
use CodeIgniter\Model;

class MunicipioModel extends Model
{
    protected $table = 'municipios';
    protected $primaryKey = 'cod_muni';
    protected $allowedFields = ['nombre_municipio', 'cod_depto'];

    protected $returnType = Municipio::class;

    public function findAllWithDepartamento()
    {
        return $this->select('municipios.*, departamentos.nombre_depto AS nombre_departamento')
            ->join('departamentos', 'departamentos.cod_depto = municipios.cod_depto')
            ->findAll();
    }
}
