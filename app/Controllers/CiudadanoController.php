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
        $request = service('request');
        $postData = $request->getPost();

        if (isset($postData['submit'])) {
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
            if ($ciudadano->insert($data)) {
                $this->session->setFlashdata('message', 'Ciudadano agregado exitosamente');
                $this->session->setFlashdata('alert-class', 'alert-success');
            } else {
                $this->session->setFlashdata('message', 'El ciudadano no se a guardado');
                $this->session->setFlashdata('alert-class', 'alert-danger');
            }
            return redirect()->to(site_url('ciudadanos/create'));
        }
    }
}
