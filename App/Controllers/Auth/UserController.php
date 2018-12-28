<?php

namespace App\Controllers\Auth;

use App\Controllers\Controller;
use App\Controllers\Auth\AuthController;
use Core\Request;
use App\User;

class UserController extends Controller
{
    public function showRegisterForm()
    {
        return $this->view('/user/register_form');
    }

    public function showLoginForm()
    {
        return $this->view('/user/login_form');
    }

    public function register()
    {
        $this->request()->validate([
            'name' => 'required',
            'lastname' => 'required',
            'email' => 'required',
            'password' => 'required',
            'confirm_password' => 'required'
        ]);
        $user = new User;
        $user->name = $this->request()->input('name');
        $user->lastname = $this->request()->input('lastname');
        $user->email = $this->request()->input('email');
        if($this->request()->input('password') == $this->request()->input('confirm_password'))
        {
            $user->password = md5($this->request()->input('password'));
            $user->save();
            $_SESSION['login@user'] = $user;
        } else {
            $this->alert('success', 'Senhas não correspondem !');
            return $this->route()->back();
        }
        return $this->route()->redirect('/');
    }

    public function login()
    {
        $this->request()->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $email = $this->request()->input('email');
        $user = (new User())->findBy('email', $email);
        if($user != NULL)
        {
            if($user->password == md5($this->request()->input('password')))
            {
                $_SESSION['login@user'] = $user;
            } else {
                $this->alert('danger', 'Senha incorreta !');
            }
        } else {
            $this->alert('danger', 'Este email não corresponde a nenhuma conta.');
        }
        return $this->route()->redirect('/');
    }

    public function logout()
    {
        if($_SESSION['login@user'])
        {
            $_SESSION['login@user'] = NULL;
        }
        return $this->route()->redirect('/login');
    }
}