<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class User extends BaseController
{
    public function __construct()
    {
        $this->model = new UserModel();
    }
    public function index()
    {
        $getAkun = $this->model->findAll();
        $data = [
            'title'     => 'Akun',
            'getAkun'   => $getAkun,
            'validation' => \Config\Services::validation()
        ];

        return view('manage_account/akun/akun', $data);
    }



    public function Create()
    {
        if ($this->request->getPost()) {
            $validation = [
                'nama_user' => [
                    'rules' => 'required|min_length[4]|max_length[25]',
                    'errors' => [
                        'required' => 'Nama Harus diisi!',
                        'min_length' => 'Nama Minimal 4 Karakter!',
                        'max_length' => 'Nama Maksimal 25 Karakter!',
                    ]
                ],
                'username' => [
                    'rules' => 'required|min_length[4]|max_length[25]|is_unique[user.username]',
                    'errors' => [
                        'required' => 'Username Harus diisi!',
                        'min_length' => 'Username Minimal 4 Karakter!',
                        'max_length' => 'Username Maksimal 25 Karakter!',
                        'is_unique' => 'Username Sudah Terdaftar!',
                    ]
                ],
                'password' => [
                    'rules' => 'required|min_length[4]|max_length[255]',
                    'errors' => [
                        'required' => 'Password Harus diisi!',
                        'min_length' => 'Password Minimal 4 Karakter!',
                        'max_length' => 'Password Maksimal 20 Karakter!',
                    ]
                ],
                'password_confirm' => [
                    'rules' => 'matches[password]',
                    'errors' => [
                        'matches' => 'Sandi tersebut tidak cocok. Coba lagi.!'
                    ]
                ],
                'image' => [
                    'rules' => 'uploaded[image]|max_size[image,5048]|is_image[image]|mime_in[image,image/jpg,image/jpeg,image/png]',
                    'errors' => [
                        'uploaded' => 'Gambar Harus Di isi!',
                        'max_size' => 'Ukuran gambar terlalu besar(max 5MB)!',
                        'is_image' => 'Yang anda pilih bukan gambar!',
                        'mime_in' => 'gambar harus berformat jpg jpeg png',
                    ]
                ],
                'level' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Level Harus Di pilih!',
                    ]
                ],

            ];
            if (!$this->validate($validation)) {
                return redirect()->back()->withInput()->with('errorModal', "$('#Create').modal('show')");
            } else {
                //jika gambar tidak di upload
                $upload = $this->request->getFile('image');
                $namaImage = $upload->getRandomName();
                $upload->move(WRITEPATH . '../public/upload/image_profile/', $namaImage);


                $newData = [
                    'nama_user' => $this->request->getVar('nama_user'),
                    'username' => $this->request->getVar('username'),
                    'password' => $this->request->getVar('password'),
                    'image' =>  $namaImage,
                    'level' => $this->request->getVar('level'),
                ];
                $this->model->save($newData);
                return redirect()->to(site_url('akun'))->with('success', 'Create Akun Berhasil!');
            }
        }
    }

    public function update($id_user) //NO USE
    {
        if (!isset($id_user) /*|| $this->request->getVar('nama_user' or 'username' or 'level') == ''*/) {
            throw PageNotFoundException::forPageNotFound();
        } else {
            $select = $this->model->find($id_user);
            $username = $select['username'];

            $validation = [
                'nama_user' => [
                    'rules' => 'required|min_length[4]|max_length[25]',
                    'errors' => [
                        'required' => 'Nama Harus diisi!',
                        'min_length' => 'Nama Minimal 4 Karakter!',
                        'max_length' => 'Nama Maksimal 25 Karakter!',
                    ]
                ],
                'username' => [
                    'rules' => "required|min_length[4]|max_length[25]|is_unique[user.username,username,{$username}]",
                    'errors' => [
                        'required' => 'Username Harus diisi!',
                        'min_length' => 'Username Minimal 4 Karakter!',
                        'max_length' => 'Username Maksimal 25 Karakter!',
                        'is_unique' => 'Username Sudah Terdaftar!',
                    ]
                ],


                'level' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Level Harus Di pilih!',
                    ]
                ],

            ];
            if ($this->request->getPost('password') != '') {
                $validation = [
                    'password' => [
                        'rules' => 'required|min_length[4]|max_length[255]',
                        'errors' => [
                            'required' => 'Password Harus diisi!',
                            'min_length' => 'Password Minimal 4 Karakter!',
                            'max_length' => 'Password Maksimal 20 Karakter!',
                        ]
                    ],
                    'password_confirm' => [
                        'rules' => 'matches[password]',
                        'errors' => [
                            'matches' => 'Sandi tersebut tidak cocok. Coba lagi.!'
                        ]
                    ],
                ];
            }
            if ($this->request->getFile('image') != '') {
                $validation = [
                    'image' => [
                        'rules' => 'uploaded[image]|max_size[image,5048]|is_image[image]|mime_in[image,image/jpg,image/jpeg,image/png]',
                        'errors' => [
                            'uploaded' => 'Gambar Harus Di isi!',
                            'max_size' => 'Ukuran gambar terlalu besar(max 5MB)!',
                            'is_image' => 'Yang anda pilih bukan gambar!',
                            'mime_in' => 'gambar harus berformat jpg jpeg png',
                        ]
                    ],
                ];
            }
            if (!$this->validate($validation)) {
                $data['validation'] = $this->validator;
                return redirect()->back()->withInput()->with('errorUA' . $id_user, 'Gagal Update Akun');
            } else {
                $data = $this->model->find($id_user);

                $newData = [
                    'nama_user' => $this->request->getVar('nama_user'),
                    'username' => $this->request->getVar('username'),
                    'level' => $this->request->getVar('level'),

                ];
                if ($this->request->getPost('password') != '') {
                    $newData['password'] = $this->request->getPost('password');
                }
                $upload = $this->request->getFile('image');
                if (!$upload->getError()) {
                    $imageFile = $data['image'];
                    if (file_exists("../public/upload/image_profile/" . $imageFile)) {
                        $unlink = unlink("../public/upload/image_profile/" . $imageFile);
                        if (isset($unlink)) {
                            $namaImage = $upload->getRandomName();
                            $newData['image'] = $namaImage;
                            $upload->move(WRITEPATH . '../public/upload/image_profile/', $namaImage);
                        }
                    }
                }
                $this->model->update($id_user, $newData);
                //jika yg di edit sedang login maka akan diloginkan lagi
                if (session()->get('id_user') == $id_user) {
                    $user = $this->model->where('username', $this->request->getVar('username'))
                        ->first();

                    $this->setUserSession($user);
                    session()->set($user);
                }
                return redirect()->to(site_url('akun'))->with('success', 'Akun Berhasil Diubah!');
            }
        }
    }
    public function delete($id_user)
    {
        if (!isset($id_user) /*|| $this->request->getVar('nama_user' or 'username' or 'level') == ''*/) {
            throw PageNotFoundException::forPageNotFound();
        } elseif (session()->get('id_user') == $id_user) {
            return redirect()->back()->with('errorModal', 'Tidak bisa hapus akun yang sedang login');
        } else {
            $data = $this->model->find($id_user);
            $namaImage = $data['image'];
            if (file_exists(WRITEPATH . '../public/upload/image_profile/' . $namaImage)) {
                unlink(WRITEPATH . '../public/upload/image_profile/' . $namaImage);
            }
            $this->model->delete($id_user);
            return redirect()->to(site_url('akun'))->with('success', 'Delete Akun Berhasil!');
        }
    }

    public function update2($id_user = null)
    {
        $getUserid = $this->model->find($id_user);
        $username = $getUserid['username'];
        $data = [
            'title' => 'Edit Akun',
            'name'  => $getUserid['nama_user'],
            'getUser' => $getUserid,
            'validation' => \Config\Services::validation()
        ];
        if ($this->request->getPost()) {
            $validation = [
                'nama_user' => [
                    'rules' => 'required|min_length[4]|max_length[25]',
                    'errors' => [
                        'required' => 'Nama Harus diisi!',
                        'min_length' => 'Nama Minimal 4 Karakter!',
                        'max_length' => 'Nama Maksimal 25 Karakter!',
                    ]
                ],
                'username' => [
                    'rules' => "required|min_length[4]|max_length[25]|is_unique[user.username,username,{$username}]",
                    'errors' => [
                        'required' => 'Username Harus diisi!',
                        'min_length' => 'Username Minimal 4 Karakter!',
                        'max_length' => 'Username Maksimal 25 Karakter!',
                        'is_unique' => 'Username Sudah Terdaftar!',
                    ]
                ],


                'level' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Level Harus Di pilih!',
                    ]
                ],

            ];
            if ($this->request->getPost('password') != '') {
                $validation = [
                    'password' => [
                        'rules' => 'required|min_length[4]|max_length[255]',
                        'errors' => [
                            'required' => 'Password Harus diisi!',
                            'min_length' => 'Password Minimal 4 Karakter!',
                            'max_length' => 'Password Maksimal 20 Karakter!',
                        ]
                    ],
                    'password_confirm' => [
                        'rules' => 'matches[password]',
                        'errors' => [
                            'matches' => 'Sandi tersebut tidak cocok. Coba lagi.!'
                        ]
                    ],
                ];
            }
            if ($this->request->getFile('image') != '') {
                $validation = [
                    'image' => [
                        'rules' => 'uploaded[image]|max_size[image,5048]|is_image[image]|mime_in[image,image/jpg,image/jpeg,image/png]',
                        'errors' => [
                            'uploaded' => 'Gambar Harus Di isi!',
                            'max_size' => 'Ukuran gambar terlalu besar(max 5MB)!',
                            'is_image' => 'Yang anda pilih bukan gambar!',
                            'mime_in' => 'gambar harus berformat jpg jpeg png',
                        ]
                    ],
                ];
            }
            if (!$this->validate($validation)) {
                $data['validation'] = $this->validator;
            } else {
                $data = $this->model->find($id_user);

                $newData = [
                    'nama_user' => $this->request->getVar('nama_user'),
                    'username' => $this->request->getVar('username'),
                    'level' => $this->request->getVar('level'),

                ];
                if ($this->request->getPost('password') != '') {
                    $newData['password'] = $this->request->getPost('password');
                }
                $upload = $this->request->getFile('image');
                if (!$upload->getError()) {
                    $imageFile = $data['image'];
                    if (file_exists("../public/upload/image_profile/" . $imageFile)) {
                        $unlink = unlink("../public/upload/image_profile/" . $imageFile);
                        if (isset($unlink)) {
                            $namaImage = $upload->getRandomName();
                            $newData['image'] = $namaImage;
                            $upload->move(WRITEPATH . '../public/upload/image_profile/', $namaImage);
                        }
                    }
                }
                $this->model->update($id_user, $newData);
                //jika yg di edit sedang login maka akan diloginkan lagi
                if (session()->get('id_user') == $id_user) {
                    $user = $this->model->where('username', $this->request->getVar('username'))
                        ->first();

                    $this->setUserSession($user);
                    session()->set($user);
                }
                return redirect()->to(site_url('akun'))->with('success', 'Edit Akun Berhasil!');
            }
        }

        return view('manage_account/akun/update', $data);
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
    public function profile()
    {
        $id_user = session()->get('id_user');
        $getUserid = $this->model->find($id_user);
        $username = $getUserid['username'];
        $data = [
            'title' => 'Profile',
            'getUser' => $getUserid,
            'validation' => \Config\Services::validation()
        ];
        if ($this->request->getPost()) {
            # code...

            $validation = [
                'nama_user' => [
                    'rules' => 'required|min_length[4]|max_length[25]',
                    'errors' => [
                        'required' => 'Nama Harus diisi!',
                        'min_length' => 'Nama Minimal 4 Karakter!',
                        'max_length' => 'Nama Maksimal 25 Karakter!',
                    ]
                ],
                'username' => [
                    'rules' => "required|min_length[4]|max_length[25]|is_unique[user.username,username,{$username}]",
                    'errors' => [
                        'required' => 'Username Harus diisi!',
                        'min_length' => 'Username Minimal 4 Karakter!',
                        'max_length' => 'Username Maksimal 25 Karakter!',
                        'is_unique' => 'Username Sudah Terdaftar!',
                    ]
                ],


            ];
            if ($this->request->getPost('password') != '') {
                $validation = [
                    'password' => [
                        'rules' => 'required|min_length[4]|max_length[255]',
                        'errors' => [
                            'required' => 'Password Harus diisi!',
                            'min_length' => 'Password Minimal 4 Karakter!',
                            'max_length' => 'Password Maksimal 20 Karakter!',
                        ]
                    ],
                    'password_confirm' => [
                        'rules' => 'matches[password]',
                        'errors' => [
                            'matches' => 'Sandi tersebut tidak cocok. Coba lagi.!'
                        ]
                    ],
                ];
            }
            if ($this->request->getFile('image') != '') {
                $validation = [
                    'image' => [
                        'rules' => 'uploaded[image]|max_size[image,5048]|is_image[image]|mime_in[image,image/jpg,image/jpeg,image/png]',
                        'errors' => [
                            'uploaded' => 'Gambar Harus Di isi!',
                            'max_size' => 'Ukuran gambar terlalu besar(max 5MB)!',
                            'is_image' => 'Yang anda pilih bukan gambar!',
                            'mime_in' => 'gambar harus berformat jpg jpeg png',
                        ]
                    ],
                ];
            }
            if (!$this->validate($validation)) {
                $data['validation'] = $this->validator;
            } else {

                $newData = [
                    'nama_user' => $this->request->getVar('nama_user'),
                    'username' => $this->request->getVar('username')

                ];
                if ($this->request->getPost('password') != '') {
                    $newData['password'] = $this->request->getPost('password');
                }
                $upload = $this->request->getFile('image');
                if (!$upload->getError()) {
                    $imageFile = $getUserid['image'];
                    if (file_exists("../public/upload/image_profile/" . $imageFile)) {
                        $unlink = unlink("../public/upload/image_profile/" . $imageFile);
                        if (isset($unlink)) {
                            $namaImage = $upload->getRandomName();
                            $newData['image'] = $namaImage;
                            $upload->move(WRITEPATH . '../public/upload/image_profile/', $namaImage);
                        }
                    }
                }
                $update = $this->model->update($id_user, $newData);
                if ($update) {
                    $user = $this->model->where('username', $this->request->getVar('username'))
                        ->first();
                    $this->setUserSession($user);
                    session();
                }
                return redirect()->to(site_url('/profile'))->with('success', 'Berhasil Ubah Profile!');
            }
        }
        return view('profile', $data);
    }
}
