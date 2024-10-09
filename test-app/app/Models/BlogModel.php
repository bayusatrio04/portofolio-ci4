<?php

namespace App\Models;

use CodeIgniter\Model;

class BlogModel extends Model
{
    protected $table      = 'blog';
    protected $primaryKey = 'blog_id';
    protected $allowedFields = ['blog_title', 'blog_description'];


    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';


    // Validation
    // protected $validationRules      = [];
    // protected $validationMessages   = [];
    // protected $skipValidation       = false;
    // protected $cleanValidationRules = true;

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

    // public function getBlog($slug = false)
    // {
    //     if ($slug == false) {
    //         return $this->findAll();
    //     }
    //     return $this->where(['slug' => $slug])->first();
    // }

    public function search($key)
    {
        $builder = $this->table('blog');
        $builder->like('blog_title', $key);
        return $builder;
    }
}
