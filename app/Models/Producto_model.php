<?php
namespace App\Models;
use CodeIgniter\Model;

class Producto_model extends Model{
    protected $table      = 'producto';
    protected $primaryKey = 'producto_id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['producto_nombre', 'producto_descripcion', 'producto_precio', 'producto_imagen', 'producto_stock', 'producto_categoria', 'producto_estado'];

    protected $useTimestamps= false;
    protected $createdField= "";
    protected $updatedField= "";
    protected $deletedField= "";
    
    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;


}