<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Entities\Region;

class RegionModel extends Model
{
    protected $table = 'regiones';
    protected $primaryKey = 'cod_region';
    protected $allowedFields = ['nombre', 'descripcion'];

    protected $returnType = Region::class;

    public function departamentos()
    {
        return $this->hasMany(DepartamentoModel::class, 'cod_region', 'cod_region');
    }
}
