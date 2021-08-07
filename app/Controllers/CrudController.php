<?php

namespace App\Controllers;

use App\Models\CrudModel;

class CrudController extends BaseController
{
    public function index()
    {
        // Consultar desde el Modelo
        $Crud = new CrudModel();
        $datos = $Crud->allPersons();
        $message = session('message');
        $validation = session('validation');

        // Array de datos
        $data = [
            'persons' => $datos, // Registros de la BD
            'message' => $message, // Mensaje de Alerta
            'validation' => $validation, // Mensaje de Validacion
        ];

        // Retornar la vista y el array con los datos
        return view('list', $data);
    }

    public function create()
    {
        // Instanciar Modelo
        $Crud = new CrudModel();

        // Si no existe error de validación
        if ($this->validate('person')) {

            // Obtener la imagen
            $photo = $this->request->getFile('photo');
            // Generar un nombre aleatorio
            $newName = $photo->getRandomName();
            // Mover la imagen a la carpeta /uploads
            $photo->move('../public/uploads/', $newName);
            // Reasignamos el nombre del archivo
            $_POST['photo'] = $newName;
            // Agregar nuevo registro
            $response = $Crud->insertPerson($_POST);

            // Mensaje de Respuesta
            if ($response) {
                return redirect()->to(base_url())->with('message', '1');
            }
        } else {
            // Si existe error de valiadación
            return redirect()->to(base_url())
                ->with('message', '0')
                ->with('validation', $this->validator->listErrors())
                ->withInput();
        }
    }

    public function update()
    {
        // Instanciar Modelo
        $Crud = new CrudModel();

        // Si no existe error de validación
        if ($this->validate('person')) {

            $photo = $this->request->getFile('photo');

            if ($photo->isValid()) {

                $data = $Crud->where('id_person', $_POST['id_person'])->first();
                unlink('../public/uploads/' . $data['photo']);

                // Generar un nombre aleatorio
                $newName = $photo->getRandomName();
                // Movemos el archivo a la carpeta indicada
                $photo->move('../public/uploads/', $newName);
                // Reasignamos el nombre del archivo
                $_POST['photo'] = $newName;
                // Actualizar el registro
            }

            $Crud->updatePerson($_POST);
            return redirect()->to(base_url())->with('message', '4');
        } else {
            // Si existe algún error de validación
            return redirect()->back()
                ->with('message', '1')
                ->with('validation', $this->validator->listErrors())
                ->withInput();
        }
    }

    public function edit($id_person = null)
    {
        // Instacia del Modelo
        $Crud = new CrudModel();
        // Obtener el registro
        $Person = $Crud->editPerson(["id_person" => $id_person]);
        // Array de datos
        $data['person'] = $Person;
        $data['message'] = session('message');
        $data['validation'] = session('validation');

        // Retornar vista y array
        return view('edit', $data);
    }

    public function delete($id_person)
    {
        // Instacia del Modelo
        $Crud = new CrudModel();
        $response = $Crud->deletePerson(["id_person" => $id_person]);

        if ($response) {
            return redirect()->to(base_url())->with('message', '2');
        }

        // 1. with()
        return redirect()->to(base_url())->with('message', '3');

        // 2. setFlashdata()
        // $session = session();
        // $session->setFlashdata('mensaje', 'Revise la información');
    }
}
