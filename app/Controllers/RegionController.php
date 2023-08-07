<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\RegionModel;

class RegionController extends Controller
{
    public function index()
    {
        $regionModel = new RegionModel();
        $regiones = $regionModel->findAll();

        $data['regiones'] = $regiones;
        return view('regiones/index', $data);
    }

    public function create()
    {
        return view('regiones/create');
    }

    public function store()
    {
        $request = service('request');
        $postData = $request->getPost();

        if (isset($postData['submit'])) {
            $region = new RegionModel();
            $data = [
                'nombre' => $postData['nombre'],
                'descripcion' => $postData['descripcion']
            ];
            if ($region->insert($data)) {
                session()->setFlashdata('message', 'Región agregada exitosamente');
                session()->setFlashdata('alert-class', 'alert-success');

                return view('regiones/create');
            } else {
                session()->setFlashdata('message', 'La región no se a guardado');
                session()->setFlashdata('alert-class', 'alert-danger');

                return view('regiones/create');
            }
        }
    }

    public function edit($cod_region = 0)
    {
        $regiones = new RegionModel();
        $data['region'] = $regiones->find($cod_region);

        return view('regiones/edit', $data);
    }

    public function update($cod_region = 0)
    {
        $request = service('request');
        $postData = $request->getPost();
        if (isset($postData['submit'])) {
            $regiones = new RegionModel();
            $data = [
                'nombre' => $postData['nombre'],
                'descripcion' => $postData['descripcion']
            ];
            if ($regiones->update($cod_region, $data)) {
                session()->setFlashdata('message', 'Región actualizada exitosamente');
                session()->setFlashdata('alert-class', 'alert-success');
            } else {
                session()->setFlashdata('message', 'La región no se a actualizado');
                session()->setFlashdata('alert-class', 'alert-danger');
            }
            $data['region'] = $regiones->where('cod_region', $cod_region)->first();
            return view('regiones/edit', $data);
        }
    }

    public function delete($cod_region = 0)
    {
        $regiones = new RegionModel();
        if ($regiones->find($cod_region)) {
            $regiones->delete($cod_region);
            session()->setFlashdata('message', '¡Región eliminada!');
            session()->setFlashdata('alert-class', 'alert-success');
        } else {
            session()->setFlashdata('message', '¡La región no se ha podido eliminar!');
            session()->setFlashdata('alert-class', 'alert-danger');
        }
        return redirect()->to(site_url('regiones/index'));
    }
}
