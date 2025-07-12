<?php

namespace App\Filters;

use App\Models\LogAktivitasModel;
use App\Models\UserModel;
use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class Auth implements FilterInterface
{
    /**
     * Do whatever processing this filter needs to do.
     * By default it should not return anything during
     * normal execution. However, when an abnormal state
     * is found, it should return an instance of
     * CodeIgniter\HTTP\Response. If it does, script
     * execution will end and that Response will be
     * sent back to the client, allowing for error pages,
     * redirects, etc.
     *
     * @param RequestInterface $request
     * @param array|null       $arguments
     *
     * @return mixed
     */
    public function before(RequestInterface $request, $arguments = null)
    {
        $uri = service('uri');
        if (!session()->get('isLoggedIn')) {

            return redirect()->to(site_url('/'));
        }

        //jika datanya tidak sama dengan session maka akan di set ulang session nya
        $model      = new UserModel();
        $select     = $model->find(session()->get('id_user'));
        $id_user   = session()->get('id_user') != $select['id_user'];
        $nama_user = session()->get('nama_user') != $select['nama_user'];
        $username   = session()->get('username') != $select['username'];
        $image      = session()->get('image') != $select['image'];
        $level      = session()->get('level') != $select['level'];
        if ($id_user || $nama_user || $username || $image || $level) {
            $user = $select;
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
    }

    /**
     * Allows After filters to inspect and modify the response
     * object as needed. This method does not allow any way
     * to stop execution of other after filters, short of
     * throwing an Exception or Error.
     *
     * @param RequestInterface  $request
     * @param ResponseInterface $response
     * @param array|null        $arguments
     *
     * @return mixed
     */
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        $uri = service('uri');

        // dd($arguments);
        // $db      = \Config\Database::connect();
        // $LogModel = new LogAktivitasModel();
        // if (session()->has('success')) {
        //     $agent = $request->getUserAgent();
        //     // $kata1 = 'Melakukan';
        //     // $kata2 = 'Create';
        //     // $kata2 = 'Update';
        //     // $kata2 = 'Delete';
        //     // $kata3 = 
        //     $Log = [
        //         'id_user' => session()->get('id_user'),
        //         'deskripsi' => session('success'),
        //         'user_agent' => $agent->getAgentString(),
        //     ];
        //     $LogModel->save($Log);
        // }
    }
}
