<?php
namespace App\Models;
use CodeIgniter\Model;

class Producto_model extends Model{
    protected $table      = 'producto';
    protected $primaryKey = 'producto_id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['producto_nombre', 'producto_descripcion', 'producto_precio', 'producto_imagen', 'producto_stock', 'producto_categoria', 'producto_estado'];

 

    
    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    
    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];


}
