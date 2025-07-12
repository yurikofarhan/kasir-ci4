<?php

namespace Config;

use CodeIgniter\Validation\CreditCardRules;
use CodeIgniter\Validation\FileRules;
use CodeIgniter\Validation\FormatRules;
use CodeIgniter\Validation\Rules;
use \App\Validation\UserRules;

class Validation
{
    //--------------------------------------------------------------------
    // Setup
    //--------------------------------------------------------------------

    /**
     * Stores the classes that contain the
     * rules that are available.
     *
     * @var string[]
     */
    public $ruleSets = [
        Rules::class,
        FormatRules::class,
        FileRules::class,
        CreditCardRules::class,
        UserRules::class,
    ];

    /**
     * Specifies the views that are used to display the
     * errors.
     *
     * @var array<string, string>
     */
    public $templates = [
        'list'   => 'CodeIgniter\Validation\Views\list',
        'single' => 'CodeIgniter\Validation\Views\single',
    ];

    //--------------------------------------------------------------------
    // Rules
    //--------------------------------------------------------------------
    public $User = [
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
}
