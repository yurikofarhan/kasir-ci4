<?php

namespace App\Validation;

use App\Models\UserModel;

class UserRules
{
    public function __construct()
    {
        $this->model = new UserModel();
    }

    public function validateUsername(string $str, string $fields, array $data)
    {
        $user = $this->model->where('username', $data['username'])
            ->first();

        if (!$user)
            return false;
    }
    public function validatePass(string $str, string $fields, array $data)
    {
        // dd($data);
        $user = $this->model->where('username', $data['username'])
            ->first();

        if (!$user) {
            return false;
        } else {
            $pass = password_verify($data['password'], $user['password']);
            if (!$pass)
                return false;

            return $pass;
        }
    }
}
