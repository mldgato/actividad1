<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Entities\Departamento;

class DepartamentoModel extends Model
{
    protected $table = 'departamentos';
    protected $primaryKey = 'cod_depto';
    protected $allowedFields = ['nombre_depto', 'cod_region'];

    protected $returnType = Departamento::class;

    public function region()
    {
        return $this->belongsTo(RegionModel::class, 'cod_region', 'cod_region');
    }

    public function findAllWithRegion()
    {
        return $this->select('departamentos.*, regiones.nombre AS nombre_region')
            ->join('regiones', 'regiones.cod_region = departamentos.cod_region')
            ->findAll();
    }
}
