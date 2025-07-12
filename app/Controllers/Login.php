<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Login extends BaseController
{
    public function __construct()
    {
        $this->model = new UserModel();
    }
    public function index()
    {
        $data = [
            'title' => 'Login'
        ];
        if ($this->request->getPost()) {
            $validation = [
                'username' => [
                    'rules' => 'required|min_length[4]|max_length[20]|validateUsername[username]',
                    'errors' => [
                        'required' => 'Username Harus di isi!',
                        'min_length' => 'Username Minimal 4 Karakter',
                        'max_length' => 'Username Maksimal 20 Karakter',
                        'validateUsername' => 'Username Yang Anda Masukan Salah!'


                    ]
                ],
                'password' => [
                    'rules' => 'required|min_length[4]|max_length[20]|validatePass[password]',
                    'errors' => [
                        'required' => 'Password harus di isi!',
                        'min_length' => 'Password Minimal 4 Karakter',
                        'max_length' => 'Password Maksimal 20 Karakter',
                        'validatePass' => 'Password Yang Anda Masukan Tidak Sesuai'
                    ]
                ],
            ];
            if (!$this->validate($validation)) {
                $data['validation'] = $this->validator;
            } else {

                $user = $this->model->where('username', $this->request->getVar('username'))
                    ->first();
                $this->setUserSession($user);
                session();
                return redirect()->to(site_url('/dashboard'))->with('success', 'Berhasil Login!');
            }
        }


        return view('login', $data);
    }

    private function setUserSession($user)
    {
        $data = [
            'id_user' => $user['id_user'],
            'nama_user' => $user['nama_user'],
            'username' => $user['username'],
            'image'     => $user['image'],
            'level' => $user['level'],
            'isLoggedIn' => true,
        ];

        session()->set($data);
        return true;
    }
    public function logout()
    {
        session()->destroy();
        return redirect()->to('dashboard')->with('success', 'Berhasil Logout!');
    }
}
