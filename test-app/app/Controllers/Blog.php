<?php

namespace App\Controllers;

use App\Models\BlogModel;


class Blog extends BaseController
{
    protected $blogModel;
    public function __construct()
    {
        $this->blogModel = new BlogModel();
    }
    public function index()
    {
        // d($this->request->getVar('keyword'));
        $key = $this->request->getVar('keyword');
        if ($key) {
            $blog = $this->blogModel->search($key);
        } else {
            $blog = $this->blogModel;
        }
        $data = [
            'title' => 'Data | Blog',
            'Blog' => $blog->paginate(6, 'blog'),
            'pager' => $this->blogModel->pager

        ];



        return  view('blog/index', $data);
    }
}
