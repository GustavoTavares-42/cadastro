<?php
namespace App\Models;
use CodeIgniter\Model;

class Pessoas extends Model
{
        protected $table      = 'pessoas';
        protected $primaryKey = 'id';
        protected $returnType     = 'array';
        protected $allowedFields = ['nome', 'cpf', 'data_nasc'];
       
    public function insertPessoasForm($dados)
    {
         $this->insert($dados);
    }
}
