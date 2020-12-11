<?php namespace App\Models;

use CodeIgniter\Model;

class ModelAnimal extends Model
{
    protected $table = 'animales';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nombre', 'edad','tipo','descripcion','comida', 'imagen'];

}