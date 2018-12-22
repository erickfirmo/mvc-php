<?php

namespace App\Controllers\Auth;

use App\Controllers\Controller;
use App\Controllers\Auth\AuthController;
use Core\Request;
use App\Admin;


class AdminController extends Controller
{

    public function showRegisterForm()
    {
        return $this->view('/admin/register_form');
    }

    public function showLoginForm()
    {
        return $this->view('/admin/login_form');
    }

    public function register()
    {
        $admin = new Admin;
        $admin->name = $this->request()->input('name');
        $admin->lastname = $this->request()->input('lastname');
        $admin->email = $this->request()->input('email');
        if($this->request()->input('password') == $this->request()->input('confirm_password'))
        {
            $admin->password = md5($this->request()->input('password'));
            $admin->save();

            
            $_SESSION['login@admin'] = $admin;

            
        } else {
            $this->alert('success', 'Senhas não correspondem !');
            return $this->route()->back();

            
        }

        
        return $this->route()->redirect('/');


        
    }

    public function login()
    {

        $email = $this->request()->input('email');

        $admin = (new Admin())->findBy('email', $email);


        
        if($admin->password == md5($this->request()->input('password')))
        {
            $_SESSION['login@admin'] = $admin;
        }

        return $this->route()->redirect('/');
    }

    public function logout()
    {
        $_SESSION['login@admin'] = NULL;

        return $this->route()->redirect('/admin/login');
    }
}