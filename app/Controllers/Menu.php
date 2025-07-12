<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DOrderModel;
use App\Models\MenuModel;
use App\Models\OrderModel;
use CodeIgniter\Exceptions\PageNotFoundException;
use CodeIgniter\I18n\Time;

class Menu extends BaseController
{
    public function __construct()
    {
        $this->model = new MenuModel();
        $this->OrderModel = new OrderModel();
        $this->DOrderModel = new DOrderModel();
    }
    public function index()
    {
        $getMenu = $this->model->orderBy('tipe_menu', 'ASC')->findAll();
        $TMenu = $this->model->countAllResults();
        $TMakanan = $this->model->where('tipe_menu', 'makanan')->countAllResults();
        $TMinuman = $this->model->where('tipe_menu', 'minuman')->countAllResults();
        $data = [
            'title' => 'Menu',
            'getMenu' => $getMenu,
            'getMakanan' => $this->model->where('tipe_menu', 'makanan')->findAll(),
            'getMinuman' => $this->model->where('tipe_menu', 'minuman')->findAll(),
            'validation' => \Config\Services::validation(),
            'menu'     => $TMenu,
            'makanan'     => $TMakanan,
            'minuman'     => $TMinuman,


        ];
        return view('pesanan/menu/menu', $data);
    }
    public function create()
    {
        if (!$this->validate([
            'nama_menu' => [
                'rules' => 'required|max_length[35]|is_unique[menu.nama_menu]',
                'errors' => [
                    'required' => 'Nama Menu Harus diisi!',
                    'max_length' => 'Nama Menu Maksimal 35 Karakter!',
                    'is_unique' => 'Nama Menu Sudah Ada!',
                ]
            ],
            'harga' => [
                'rules' => 'required|max_length[9]',
                'errors' => [
                    'required' => 'Harga Harus diisi!',
                    'max_length' => 'Harga Maksimal 9 Karakter!',
                ]
            ],
            'status_menu' => [
                'rules' => 'required|max_length[50]',
                'errors' => [
                    'required' => 'Status Menu Harus diisi!',
                    'max_length' => 'Status Menu Maksimal 25 Karakter!',
                ]
            ],
            'tipe_menu' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tipe Menu Harus diisi!',
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


        ])) {
            $data['validation'] = $this->validator;
            return redirect()->back()->withInput()->with('errorModal', "$('#Create').modal('show')");
        } else {
            $upload = $this->request->getFile('image');

            $image = \Config\Services::image()
                ->withFile($upload)
                ->resize(496, 286, false, 'height')
                ->save(WRITEPATH . '../public/upload/image_menu/' . $namaImage = $upload->getRandomName());

            $newData = [
                'nama_menu'      => $this->request->getVar('nama_menu'),
                'harga'             => $this->request->getVar('harga'),
                'status_menu'    => $this->request->getVar('status_menu'),
                'tipe_menu'      => $this->request->getVar('tipe_menu'),
                'image'             => $namaImage,
            ];
            $this->model->save($newData);
            return redirect()->to(site_url('menu'))->with('success', 'Create Menu Berhasil!');
        }
    }
    public function update($id_menu = null)
    {
        $getMenuid = $this->model->find($id_menu);
        $data = [
            'title' => 'Edit Menu',
            'name'  => $getMenuid['nama_menu'],
            'getMenu' => $getMenuid,
            'validation' => \Config\Services::validation()


        ];
        if ($this->request->getPost()) {
            $validation = [
                'nama_menu' => [
                    'rules' => "required|max_length[35]|is_unique[menu.nama_menu,nama_menu,{$getMenuid['nama_menu']}]",
                    'errors' => [
                        'required' => '{field} Harus diisi!',
                        'max_length' => '{field} Maksimal 35 Karakter!',
                        'is_unique' => '{field} Sudah Ada!',
                    ]
                ],
                'harga' => [
                    'rules' => 'required|max_length[9]',
                    'errors' => [
                        'required' => '{field} Harus diisi!',
                        'max_length' => '{field} Maksimal 9 Karakter!',
                    ]
                ],
                'status_menu' => [
                    'rules' => 'required|max_length[50]',
                    'errors' => [
                        'required' => '{field} Harus diisi!',
                        'max_length' => '{field} Maksimal 25 Karakter!',
                    ]
                ],
                'tipe_menu' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} Harus diisi!',
                    ]
                ],
            ];
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
                    'nama_menu'      => $this->request->getVar('nama_menu'),
                    'harga'             => $this->request->getVar('harga'),
                    'status_menu'    => $this->request->getVar('status_menu'),
                    'tipe_menu'      => $this->request->getVar('tipe_menu'),
                ];
                $upload = $this->request->getFile('image');
                if (!$upload->getError()) {
                    $imageFile = $getMenuid['image'];
                    if (file_exists("../public/upload/image_menu/" . $imageFile)) {
                        $unlink = unlink("../public/upload/image_menu/" . $imageFile);
                        if (isset($unlink)) {
                            $upload = $this->request->getFile('image');
                            $image = \Config\Services::image()
                                ->withFile($upload)
                                ->resize(496, 286, false, 'height')
                                ->save(WRITEPATH . '../public/upload/image_menu/' . $namaImage = $upload->getRandomName());
                            $newData['image'] = $namaImage;
                        }
                    }
                }
                $this->model->update($id_menu, $newData);
                return redirect()->to(site_url('menu'))->with('success', 'Ubah Menu Berhasil!');
            }
        }
        return view('pesanan/menu/update', $data);
    }
    public function delete($id_menu)
    {
        $data = $this->model->find($id_menu);
        if (isset($data)) {
            $namaImage = $data['image'];
            if (file_exists(WRITEPATH . '../public/upload/image_menu/' . $namaImage)) {
                unlink(WRITEPATH . '../public/upload/image_menu/' . $namaImage);
            }
            $this->model->delete($id_menu);
            return redirect()->to(site_url('menu'))->with('success', 'Hapus Menu Berhasil!');
        } else {
            throw PageNotFoundException::forPageNotFound();
        }
    }
    public function actionPesan($id_menu)
    {
        if (isset($id_menu)) {

            $validation = [
                'jumlah' => [
                    'rules' => 'required|max_length[2]',
                    'errors' => [
                        'required' => 'Jumlah Harus diisi!',
                        'max_length' => 'Jumlah Tidak Lebih 2 Karakter!',
                    ]
                ],

            ];
            if ($this->request->getPost('keterangan') != '') {
                $validation = [
                    'keterangan' => [
                        'rules' => 'max_length[100]',
                        'errors' => [
                            'max_length' => 'Keterangan Tidak Lebih 100 Karakter!',
                        ]
                    ],
                ];
            }
            if (!$this->validate($validation)) {
                $data['validation'] = $this->validator;
                return redirect()->back()->withInput()->with('errorModal', "$('#Pesan$id_menu').modal('show')");
            } else {
                $findOrder = $this->OrderModel->where([
                    'status_order' => 'belum_bayar',
                    'id_user'     => session()->get('id_user')
                ])->first();
                // dd($findOrder['id_order']);
                if (!isset($findOrder)) {
                    $newOrder = [
                        'tanggal_order' => Time::now(),
                        'id_user'      => session()->get('id_user'),
                        'keterangan'    => $this->request->getVar('keterangan'),
                        'status_order'  => 'belum_bayar'
                    ];
                    $this->OrderModel->save($newOrder);
                }
                $findOrder2 = $this->OrderModel->where([
                    'status_order' => 'belum_bayar',
                    'id_user'     => session()->get('id_user')
                ])->first(); //select setelah di buat
                for ($i = 1; $i <= $this->request->getPost('jumlah'); $i++) {
                    $newDOrder[$i] = [
                        'id_order'              => $findOrder2['id_order'],
                        'id_menu'            => $id_menu,
                        'keterangan'            => $this->request->getVar('keterangan'),
                        'status_detail_order'   => 'belum_checkout',
                    ];
                }
                $this->DOrderModel->insertBatch($newDOrder);

                return redirect()->to(site_url('menu'))->with('success', 'Berhasil Dipesan!');
            }
        } else {
            throw PageNotFoundException::forPageNotFound();
        }
    }
}
