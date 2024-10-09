<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Home | Portofolio'
        ];

        return  view('pages/home', $data);
    }

    public function about()
    {
        $data = [
            'title' => 'About'
        ];

        return  view('pages/about', $data);
    }
    public function contact()
    {
        $data = [
            'title' => 'Contact',

            'alamat' =>
            [
                [
                    'tipe' => 'Rumah',
                    'kelurahan' => 'Cipondoh Makmur',
                    'kecamatan' => 'Cipondoh',
                    'kota' => 'Tangerang',
                    'alamat_lengkap' => 'Jalan Maulana Hasanudin Gang.Anggrek No.79 RT.04/RW.02 
                                        Kelurahan Cipondoh Makmur, 
                                        Kecamatan Cipondoh, 
                                        Kota Tangerang 15148'
                ],
                [
                    'tipe' => 'Kantor',
                    'kelurahan' => 'Cipondoh Makmur',
                    'kecamatan' => 'Cipondoh',
                    'kota' => 'Tangerang',
                    'alamat_lengkap' => 'Jalan Maulana Hasanudin Gang.Anggrek No.80 RT.04/RW.02 
                                        Kelurahan Cipondoh Makmur, 
                                        Kecamatan Cipondoh, 
                                        Kota Tangerang 15148'
                ],

            ],
        ];

        return  view('pages/contact', $data);
    }
}
