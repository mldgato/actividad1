<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\MunicipioModel;
use App\Models\DepartamentoModel;

class MunicipioController extends Controller
{
    public $session;
    public function __construct()
    {
        $this->session = \Config\Services::session();
    }

    public function index()
    {
        $municipioModel = new MunicipioModel();
        $municipios = $municipioModel->findAllWithDepartamento();

        $data['municipios'] = $municipios;
        return view('municipios/index', $data);
    }

    public function create()
    {
        $departamentoModel = new DepartamentoModel();
        $departamentos = $departamentoModel->findAll();

        $data['departamentos'] = $departamentos;
        return view('municipios/create', $data);
    }

    public function store()
    {
        $request = service('request');
        $postData = $request->getPost();

        if (isset($postData['submit'])) {
            $municipio = new MunicipioModel();
            $data = [
                'nombre_municipio' => $postData['nombre_municipio'],
                'cod_depto' => $postData['cod_depto']
            ];
            if ($municipio->insert($data)) {
                $this->session->setFlashdata('message', 'Municipio agregado exitosamente');
                $this->session->setFlashdata('alert-class', 'alert-success');
            } else {
                $this->session->setFlashdata('message', 'El municipio no se a guardado');
                $this->session->setFlashdata('alert-class', 'alert-danger');
            }
            return redirect()->to(site_url('municipios/create'));
        }
    }

    public function edit($cod_muni = 0)
    {
        $municipioModel = new MunicipioModel();
        $municipio = $municipioModel->find($cod_muni);
        $data['municipio'] = $municipio;

        $departamentoModel = new DepartamentoModel();
        $departamentos = $departamentoModel->findAll();
        $data['departamentos'] = $departamentos;

        return view('municipios/edit', $data);
    }

    public function update($cod_muni = 0)
    {
        $request = service('request');
        $postData = $request->getPost();
        if (isset($postData['submit'])) {
            $municipioModel = new MunicipioModel();
            $data = [
                'nombre_municipio' => $postData['nombre_municipio'],
                'cod_depto' => $postData['cod_depto']
            ];
            if ($municipioModel->update($cod_muni, $data)) {
                session()->setFlashdata('message', 'Municipio actualizado exitosamente');
                session()->setFlashdata('alert-class', 'alert-success');
            } else {
                session()->setFlashdata('message', 'El municipio no se a actualizado');
                session()->setFlashdata('alert-class', 'alert-danger');
            }
            $data['municipio'] = $municipioModel->where('cod_muni', $cod_muni)->first();

            $departamentoModel = new DepartamentoModel();
            $departamentos = $departamentoModel->findAll();
            $data['departamentos'] = $departamentos;

            return view('municipios/edit', $data);
        }
    }

    public function delete($cod_muni = 0)
    {
        $municipioModel = new MunicipioModel();
        if ($municipioModel->find($cod_muni)) {
            $municipioModel->delete($cod_muni);
            session()->setFlashdata('message', 'Municipio eliminado!');
            session()->setFlashdata('alert-class', 'alert-success');
        } else {
            session()->setFlashdata('message', '¡El municipio no se ha podido eliminar!');
            session()->setFlashdata('alert-class', 'alert-danger');
        }
        return redirect()->to(site_url('municipios/index'));
    }
}
