<?php

namespace App\Controllers;

use App\Models\EmployeesModel;

class Employees extends BaseController
{
    protected $employeesModel;
    public function __construct()
    {
        $this->employeesModel = new EmployeesModel();
    }
    public function index()
    {
        // $employeesData = $this->employeesModel->findAll();
        $data = [
            'title' => 'Data | Employees',
            'employeesData' => $this->employeesModel->getEmployees(),
        ];

        // $employeesModel = new \App\Models\EmployeesModel();
        // $employeesModel = new EmployeesModel();
        // dd($employeesData);

        return  view('employees/index', $data);
    }

    public function create()
    {
        // session();
        $data = [
            'title' => 'Create | Employees',
            'validation' => \Config\Services::validation()

        ];
        return view('employees/create', $data);
    }
    public function store()
    {
        // Validasi input
        if (!$this->validate([
            'email' => 'required|is_unique[employees.email]',
            'no_telp' => 'required|is_unique[employees.no_telp]',
            'photo' => [
                'rules' => 'uploaded[photo]|max_size[photo,3024]|is_image[photo]|mime_in[photo,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'uploaded' => 'Pilih photo profile anda.',
                    'max_size' => 'Pilih ukuran gambar max 3MB.',
                    'mime_in' => 'Pilih Gambar yang benar (JPG, JPEG, PNG).',
                    'is_image' => 'File harus berupa gambar.'
                ]
            ]
        ])) {
            // Jika validasi gagal, kembali ke halaman dengan input dan error
            return redirect()->to('/employees/create')->withInput()->with('validation', \Config\Services::validation());
        }

        // Upload foto
        $filePhoto = $this->request->getFile('photo');
        $fileName = $filePhoto->getRandomName(); // Membuat nama file acak
        $filePhoto->move('uploads/photos', $fileName); // Memindahkan file ke folder 'uploads/photos'

        // Membuat slug unik berdasarkan nama
        $slug = url_title($this->request->getVar('name') . '-' . time(), '-', true);

        // Menyimpan data ke database
        $this->employeesModel->save([
            'name' => $this->request->getVar('name'),
            'slug' => $slug,
            'position' => $this->request->getVar('position'),
            'departement' => $this->request->getVar('departement'),
            'email' => $this->request->getVar('email'),
            'no_telp' => $this->request->getVar('no_telp'),
            'join_date' => $this->request->getVar('join_date'),
            'status' => $this->request->getVar('status'),
            'photo' => $fileName
        ]);

        // Flash message setelah berhasil menyimpan
        session()->setFlashdata('Status', 'Data employees successfully created.');

        return redirect()->to('/employees');
    }

    // public function store()
    // {
    //     if (!$this->validate([
    //         'email' => 'required|is_unique[employees.email]',
    //         'no_telp' => 'required|is_unique[employees.no_telp]',
    //         'photo' => [
    //             'rules' => 'uploaded[photo]|max_size[photo,3024]|is_image[photo]|mime_in[photo,image/jpg, image/jpeg, image/png]',
    //             'errors' => [
    //                 'uploaded' => 'Pilih photo profile anda.',
    //                 'max_size' => 'Pilih ukuran gambar max 3mb.',
    //                 'mime_in' => 'Pilih Gambar bukan yang lain.',
    //                 'is_image' => 'Pilih Gambar bukan yang lain.'
    //             ]
    //         ]

    //     ])) {
    //         $validation = \Config\Services::validation();

    //         return redirect()->to('/employees/create')->withInput()->with('validation', $validation);
    //     }
    //     dd("berhasil upload");
    //     $slug = url_title($this->request->getVar('name') . '-' . time(), '-', true);
    //     $this->employeesModel->save([
    //         'name' => $this->request->getVar('name'),
    //         'slug' => $slug,
    //         'position' => $this->request->getVar('position'),
    //         'departement' => $this->request->getVar('departement'),
    //         'email' => $this->request->getVar('email'),
    //         'no_telp' => $this->request->getVar('no_telp'),
    //         'join_date' => $this->request->getVar('join_date'),
    //         'status' => $this->request->getVar('status'),
    //     ]);
    //     session()->setFlashdata('Status', 'Data employees successfully created.');
    //     return redirect()->to('/employees');
    // }

    public function detail($slug)
    {
        // $employ = $this->employeesModel->getEmployees($slug);
        $data = [
            'title' => 'Detail | Employees',
            'employeesData' => $this->employeesModel->getEmployees($slug),
        ];
        if (empty($data['employeesData'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Employees ' . $slug . ' Not Found!');
        }
        return view('employees/detail', $data);
    }

    public function edit($slug)
    {
        // session();

        $data = [
            'title' => 'Edit | Employees',
            'validation' => \Config\Services::validation(),
            'employeesData' => $this->employeesModel->getEmployees($slug),

        ];
        // dd($data['employeesData']);
        return view('employees/edit', $data);
    }
    public function update($id)
    {
        $filePhoto = $this->request->getFile('photo');
        if ($filePhoto->getError() == 4) {
            $namaPhoto = $this->request->getVar('photoLama');
        } else {
            $namaPhoto = $filePhoto->getRandomName();
            $filePhoto->move('uploads/photos/', $namaPhoto);
            unlink('uploads/photos/' . $this->request->getVar('photoLama'));
        }
        $slug = url_title($this->request->getVar('name') . '-' . time(), '-', true);
        $this->employeesModel->save([
            'id' => $id,
            'name' => $this->request->getVar('name'),
            'slug' => $slug,
            'position' => $this->request->getVar('position'),
            'departement' => $this->request->getVar('departement'),
            'email' => $this->request->getVar('email'),
            'no_telp' => $this->request->getVar('no_telp'),
            'join_date' => $this->request->getVar('join_date'),
            'photo' => $namaPhoto,
            'status' => $this->request->getVar('status'),
        ]);
        session()->setFlashdata('Status', 'Data employees successfully updated.');
        return redirect()->to('/employees');
    }
    public function delete($id)
    {
        $photoID = $this->employeesModel->find($id);
        unlink('uploads/photos/' . $photoID['photo']);
        $this->employeesModel->delete($id);
        session()->setFlashdata('Status', 'Data employees successfully deleted.');
        return redirect()->to('/employees');
    }
}
