<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\NivelModel;

class NivelController extends Controller
{
    public function index()
    {
        $nivelModel = new NivelModel();
        $niveles = $nivelModel->findAll();

        $data['niveles'] = $niveles;
        return view('niveles/index', $data);
    }

    public function create()
    {
        return view('niveles/create');
    }

    public function store()
    {
        $request = service('request');
        $postData = $request->getPost();

        if (isset($postData['submit'])) {
            $nivelModel = new NivelModel();
            $data = [
                'nombre' => $postData['nombre'],
                'descripcion' => $postData['descripcion']
            ];
            if ($nivelModel->insert($data)) {
                session()->setFlashdata('message', 'Nivel agregado exitosamente');
                session()->setFlashdata('alert-class', 'alert-success');

                return view('niveles/create');
            } else {
                session()->setFlashdata('message', 'El nivel no se a guardado');
                session()->setFlashdata('alert-class', 'alert-danger');

                return view('niveles/create');
            }
        }
    }

    public function edit($cod_nivel_acad = 0)
    {
        $nivelModel = new NivelModel();
        $data['nivel'] = $nivelModel->find($cod_nivel_acad);

        return view('niveles/edit', $data);
    }

    public function update($cod_nivel_acad = 0)
    {
        $request = service('request');
        $postData = $request->getPost();
        if (isset($postData['submit'])) {
            $nivelModel = new NivelModel();
            $data = [
                'nombre' => $postData['nombre'],
                'descripcion' => $postData['descripcion']
            ];
            if ($nivelModel->update($cod_nivel_acad, $data)) {
                session()->setFlashdata('message', 'Nivel actualizado exitosamente');
                session()->setFlashdata('alert-class', 'alert-success');
            } else {
                session()->setFlashdata('message', 'El nivel no se a actualizado');
                session()->setFlashdata('alert-class', 'alert-danger');
            }
            $data['nivel'] = $nivelModel->where('cod_nivel_acad', $cod_nivel_acad)->first();
            return view('niveles/edit', $data);
        }
    }

    public function delete($cod_nivel_acad = 0)
    {
        $nivelModel = new NivelModel();
        if ($nivelModel->find($cod_nivel_acad)) {
            $nivelModel->delete($cod_nivel_acad);
            session()->setFlashdata('message', '¡Nivel eliminado!');
            session()->setFlashdata('alert-class', 'alert-success');
        } else {
            session()->setFlashdata('message', '¡El nivel no se ha podido eliminar!');
            session()->setFlashdata('alert-class', 'alert-danger');
        }
        return redirect()->to(site_url('niveles/index'));
    }
}
