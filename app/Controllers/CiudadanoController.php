<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\CiudadanoModel;
use App\Models\MunicipioModel;
use App\Models\NivelModel;

class CiudadanoController extends Controller
{
    public $session;
    public function __construct()
    {
        $this->session = \Config\Services::session();
    }

    protected $helpers = ['form', 'url'];
    protected $validation;

    public function index()
    {
        $ciudadanoModel = new CiudadanoModel();
        $ciudadanos = $ciudadanoModel->findAll();

        $data['ciudadanos'] = $ciudadanos;
        return view('ciudadanos/index', $data);
    }

    public function create()
    {
        $municipioModel = new MunicipioModel();
        $municipios = $municipioModel->findAll();
        $data['municipios'] = $municipios;

        $nivelModel = new NivelModel();
        $niveles = $nivelModel->findAll();
        $data['niveles'] = $niveles;

        return view('ciudadanos/create', $data);
    }

    public function store()
    {
        $validationRules = [
            'dpi' => 'required|numeric|is_unique[ciudadanos.dpi]',
            'apellido' => 'required',
            'nombre' => 'required',
            'direccion' => 'required',
            'tel_casa' => 'required|numeric',
            'tel_movil' => 'required|numeric',
            'email' => 'required|valid_email',
            'fechanac' => 'required|valid_date[Y-m-d]',
            'cod_nivel_acad' => 'required|numeric',
            'cod_muni' => 'required|numeric',
            'contra' => 'required|min_length[6]',
            'contrar' => 'required|matches[contra]'
        ];

        if ($this->validate($validationRules)) {
            $request = service('request');
            $postData = $request->getPost();

            $ciudadano = new CiudadanoModel();
            $data = [
                'dpi' => $postData['dpi'],
                'apellido' => $postData['apellido'],
                'nombre' => $postData['nombre'],
                'direccion' => $postData['direccion'],
                'tel_casa' => $postData['tel_casa'],
                'tel_movil' => $postData['tel_movil'],
                'email' => $postData['email'],
                'fechanac' => $postData['fechanac'],
                'cod_nivel_acad' => $postData['cod_nivel_acad'],
                'cod_muni' => $postData['cod_muni'],
                'contra' => $postData['contra']
            ];
            /* if ($ciudadano->insert($data)) {
                $this->session->setFlashdata('message', 'Ciudadano agregado exitosamente');
                $this->session->setFlashdata('alert-class', 'alert-success');
                return redirect()->to(site_url('ciudadanos/index'));
            } else {
                $this->session->setFlashdata('message', 'El ciudadano no se ha guardado');
                $this->session->setFlashdata('alert-class', 'alert-danger');
                return redirect()->to(site_url('ciudadanos/index'));
            } */
            $ciudadano->insert($data);
            $this->session->setFlashdata('message', 'Ciudadano agregado exitosamente');
            $this->session->setFlashdata('alert-class', 'alert-success');
            return redirect()->to(site_url('ciudadanos/create'));
        } else {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
    }
    public function edit($dpi = 0)
    {
        $ciudadanoModel = new CiudadanoModel();
        $ciudadano = $ciudadanoModel->find($dpi);
        $data['ciudadano'] = $ciudadano;

        $municipioModel = new MunicipioModel();
        $municipios = $municipioModel->findAll();
        $data['municipios'] = $municipios;

        $nivelModel = new NivelModel();
        $niveles = $nivelModel->findAll();
        $data['niveles'] = $niveles;

        return view('ciudadanos/edit', $data);
    }
    public function update($dpi = 0)
    {
        $request = service('request');
        $postData = $request->getPost();
        if (isset($postData['submit'])) {
            $ciudadanoModel = new CiudadanoModel();
            $data = [
                'apellido' => $postData['apellido'],
                'nombre' => $postData['nombre'],
                'direccion' => $postData['direccion'],
                'tel_casa' => $postData['tel_casa'],
                'tel_movil' => $postData['tel_movil'],
                'email' => $postData['email'],
                'fechanac' => $postData['fechanac'],
                'cod_nivel_acad' => $postData['cod_nivel_acad'],
            ];
            if ($ciudadanoModel->update($dpi, $data)) {
                session()->setFlashdata('message', 'Ciudadano actualizado exitosamente');
                session()->setFlashdata('alert-class', 'alert-success');
            } else {
                session()->setFlashdata('message', 'El ciudadano no se a actualizado');
                session()->setFlashdata('alert-class', 'alert-danger');
            }
            $data['ciudadano'] = $ciudadanoModel->where('dpi', $dpi)->first();

            $municipioModel = new MunicipioModel();
            $municipios = $municipioModel->findAll();
            $data['municipios'] = $municipios;

            $nivelModel = new NivelModel();
            $niveles = $nivelModel->findAll();
            $data['niveles'] = $niveles;

            return view('ciudadanos/edit', $data);
        }
    }

    public function delete($dpi = 0)
    {
        $ciudadanoModel = new CiudadanoModel();
        if ($ciudadanoModel->find($dpi)) {
            $ciudadanoModel->delete($dpi);
            session()->setFlashdata('message', 'Ciudadano eliminado!');
            session()->setFlashdata('alert-class', 'alert-success');
        } else {
            session()->setFlashdata('message', '¡El ciudadano no se ha podido eliminar!');
            session()->setFlashdata('alert-class', 'alert-danger');
        }
        return redirect()->to(site_url('ciudadanos/index'));
    }
}
