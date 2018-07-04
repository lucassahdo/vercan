<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Models\MySession;

class LoginController extends Controller {
    private $my_session;

    function __construct($Cache = null) {
        $this->my_session = new MySession();     
    }

    public function index() {
        if ($this->my_session->checkSession()) {
            return redirect()->route('dashboard');
        }

        return view('pages.login');
    }
    
    public function in(Request $req) {
        $data = $req->all();
        if ($this->validateLogin($data['email'], $data['password'])) {                   
            $this->my_session->setSession();
            return redirect()->route('dashboard');
        }
        return view('pages.login');
    }

    public function out() {
        $this->my_session->endSession();
        return redirect()->route('login');
    }

    private function validateLogin($email, $password) {
        $users = [
            [
                'email' => 'admin@vercan.com.br',
                'password' => 'vercan@123'
            ]
        ];

        foreach ($users as $user) {
            if (
                $user['email'] == $email && 
                $user['password'] == $password
            ) {
                return true;
            }
        }

        return false;
    }    
}
