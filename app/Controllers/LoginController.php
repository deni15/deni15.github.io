<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelUser;

class LoginController extends BaseController
{
	public function index()
	{
		return view('auth/login');
	}

	public function process()
    {
		
        $users = new ModelUser();
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $dataUser = $users->where([
            'username' => $username,
        ])->first();
        if ($dataUser) {
            if ($password == $dataUser->password) {
                session()->set([
                    'username' => $dataUser->username,
                    'fullname' => $dataUser->fullname,
                    'logged_in' => TRUE
                ]);
                return redirect()->to(base_url('home'));
            } else {
                session()->setFlashdata('error', 'Username & Password Salah');
                return redirect()->back();
            }
        } else {
            session()->setFlashdata('error', 'Username & Password Salah');
            return redirect()->back();
        }
    }
	function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }
}
