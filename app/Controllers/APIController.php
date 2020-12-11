<?php namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class APIController extends ResourceController
{
    protected $modelName = 'App\Models\ModelAnimal';
    protected $format    = 'json';

    public function index()
    {
        return $this->respond($this->model->findAll());
    }

    public function insertar()
    {    
        $nombre = $this->request->getPost("nombre");
        $tipo = $this->request->getPost("tipo");
        $edad = $this->request->getPost("edad");
        $descripcion = $this->request->getPost("descripcion");
        $comida = $this->request->getPost("comida");
        $imagen = $this->request->getPost("imagen");
        
        $send = array(
            "nombre" => $nombre,
            "tipo" => $tipo,
            "edad" => $edad,
            "descripcion" => $descripcion,
            "comida" => $comida,
            "imagen" => $imagen,
        );

        if($this->validate('animalPost')){
            $id = $this->model->insert($send);
            return $this->respond($this->model->find($id));

        }else{
            $validation =  \Config\Services::validation();
            return $this->respond($validation->getErrors());
        }
    }

    public function eliminar($id)
    {
        $consulta = $this->model->where("id",$id)->delete();
        $affectedrows = $consulta->connID->affected_rows;
        
        if($affectedrows == 1){
            $mensaje= array(
                "mensaje" => "Registro elimado con exito",
            );
    
            return $this->respond(json_encode($mensaje),200);
        }

        else{
            $mensaje= array(
                "mensaje" => "El id no existe  ",
            );
    
            return $this->respond(json_encode($mensaje),400);
        }

    }

    public function editar($id){
        $datosAEditar = $this->request->getRawInput();

        $nombre = $datosAEditar["nombre"];
        $tipo = $datosAEditar["tipo"];
        $edad = $datosAEditar["edad"];
        $descripcion = $datosAEditar["descripcion"];
        $comida = $datosAEditar["comida"];

        $send = array(
            "nombre" => $nombre,
            "tipo" => $tipo,
            "edad" => $edad,
            "descripcion" => $descripcion,
            "comida" => $comida,
        );

        if($this->validate('animalPUT')){
            
            $this->model->update($id, $send);
            return $this->respond($this->model->find($id));
        
        } 
        
        else {
            $validation =  \Config\Services::validation();
            return $this->respond($validation->getErrors());
        }
    }


    public function obtener($id){
        $consulta = $this->model->find($id);
        return $this->respond($consulta);
    }
    // ...
}