<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\DepartamentoModel;
use App\Models\RegionModel;

class DepartamentoController extends Controller
{
    public $session;
    public function __construct()
    {
        $this->session = \Config\Services::session();
    }

    public function index()
    {
        $departamentoModel = new DepartamentoModel();
        $departamentos = $departamentoModel->findAllWithRegion();

        $data['departamentos'] = $departamentos;
        return view('departamentos/index', $data);
    }

    public function create()
    {
        $regionModel = new RegionModel();
        $regiones = $regionModel->findAll();

        $data['regiones'] = $regiones;
        return view('departamentos/create', $data);
    }

    public function store()
    {
        $request = service('request');
        $postData = $request->getPost();

        if (isset($postData['submit'])) {
            $departamento = new DepartamentoModel();
            $data = [
                'nombre_depto' => $postData['nombre_depto'],
                'cod_region' => $postData['cod_region']
            ];
            if ($departamento->insert($data)) {
                $this->session->setFlashdata('message', 'Departamento agregado exitosamente');
                $this->session->setFlashdata('alert-class', 'alert-success');
            } else {
                $this->session->setFlashdata('message', 'El departamento no se a guardado');
                $this->session->setFlashdata('alert-class', 'alert-danger');
            }
            return redirect()->to(site_url('departamentos/create'));
        }
    }

    public function edit($cod_depto = 0)
    {
        $departamentoModel = new DepartamentoModel();
        $departamento = $departamentoModel->find($cod_depto);
        $data['departamento'] = $departamento;

        $regionModel = new RegionModel();
        $regiones = $regionModel->findAll();
        $data['regiones'] = $regiones;

        return view('departamentos/edit', $data);
    }

    public function update($cod_depto = 0)
    {
        $request = service('request');
        $postData = $request->getPost();
        if (isset($postData['submit'])) {
            $departamentoModel = new DepartamentoModel();
            $data = [
                'nombre_depto' => $postData['nombre_depto'],
                'cod_region' => $postData['cod_region']
            ];
            if ($departamentoModel->update($cod_depto, $data)) {
                session()->setFlashdata('message', 'Departamento actualizado exitosamente');
                session()->setFlashdata('alert-class', 'alert-success');
            } else {
                session()->setFlashdata('message', 'El departamento no se a actualizado');
                session()->setFlashdata('alert-class', 'alert-danger');
            }
            $data['departamento'] = $departamentoModel->where('cod_depto', $cod_depto)->first();

            $regionModel = new RegionModel();
            $regiones = $regionModel->findAll();
            $data['regiones'] = $regiones;

            return view('departamentos/edit', $data);
        }
    }

    public function delete($cod_depto = 0)
    {
        $departamentoModel = new DepartamentoModel();
        if ($departamentoModel->find($cod_depto)) {
            $departamentoModel->delete($cod_depto);
            session()->setFlashdata('message', '¡Departamento eliminado!');
            session()->setFlashdata('alert-class', 'alert-success');
        } else {
            session()->setFlashdata('message', '¡El departamento no se ha podido eliminar!');
            session()->setFlashdata('alert-class', 'alert-danger');
        }
        return redirect()->to(site_url('departamentos/index'));
    }
}
