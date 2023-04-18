<?php

namespace App\Models;

use CodeIgniter\Model;

class PesertaModel extends Model
{
    protected $table      = 'peserta';
    protected $primaryKey = 'no_peserta';
    /*
    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;
*/
    protected $allowedFields = ['nama', 'no_peserta', 'email', 'password', 'sekolah', 'ttl', 'alamat', 'nomor', 'prodi', 'gender', 'status', 'ujian'];
    /*
    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
    */

    public function saveMhs($data)
    {
        return $this->db->table($this->table)->insert($data); //->query builder
    }

    public function getMhs($no_peserta = "")
    {
        if ($no_peserta == "") {
            return $this->findAll();
        } else {
            return $this->where(['no_peserta' => $no_peserta])->first();
        }
    }
}
