<?php

namespace App\Models;

use CodeIgniter\Model;

class CrudModel extends Model
{
    // Activar para probar segundo método de consulta de Query Builder
    // Ya se define con anterioridad la tabla y llave primaria
    protected $table = 'persons';
    protected $primaryKey = 'id_person';
    protected $allowedFields = ['name', 'lastname', 'age'];

    public function allPersons()
    {
        // 1. Query Builder: retornar todos los registros de la tabla Personas
        // con consultas SQL
        $Persons = $this->db->query("SELECT * FROM persons");
        // Retornar el resultado (Arreglo de Objetos)
        return $Persons->getResult();

        // 2. Query Builder: retornar todos los registros de la tabla Personas
        // con métodos predefinidos. Para que funcione se debe consultar en la
        // vista como un arreglo asociativo. Ejm: person['name']
        // $Persons = $this->orderBy('id_person', 'ASC')->findAll();
        // Retornar el resultado (Arreglo Asociativo)
        // return $Persons;
    }

    public function insertPerson($data)
    {
        // Inserta los datos (nuevo registro) a la tabla Personas
        $this->db->table('persons')->insert($data);
        // Retorna el último ID de la tabla
        return $this->db->insertID();
    }

    public function editPerson($id_person)
    {
        // 1. Consulta una tabla en específico
        // $Persons = $this->db->table('persons')->where($id_person);
        // Retornar el registro en un Array
        // return $Persons->get()->getResultArray();

        // 2. Consulta la tabla ya definida
        $Person = $this->where('id_person', $id_person)->first();
        // Retornar el registro
        return $Person;
    }

    public function updatePerson($data)
    {
        // 1. Actualizar una tabla específica
        $Persons = $this->db->table('persons');
        $Persons->set($data)->where('id_person', $data['id_person']);
        return $Persons->update();

        // 2. Actualizar la tabla definida, y retornar booleano (Fallando)
        // return $this->update($data['id_person'], $data);
    }

    public function deletePerson($id_person)
    {
        $Person = $this->where('id_person', $id_person)->first();
        unlink('../public/uploads/' . $Person['photo']);
        return $this->where('id_person', $id_person)->delete();
    }
}
