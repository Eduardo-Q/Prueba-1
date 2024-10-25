<?php

namespace App\Controllers;

use App\Models\LoginModel;
use CodeIgniter\Controller;

class LoginController extends Controller
{
    public function index()
    {
        return view('login'); // Muestra la vista del formulario de login
    }

    public function authenticate()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        
        $loginModel = new LoginModel();
        $user = $loginModel->loginBD($username, $password);

        if ($user) {
            // Guarda la sesión de usuario
            session()->set([
                'isLoggedIn' => true,
                'userId'     => $user->id, // Cambia `id` si tu tabla tiene otro nombre de campo
                'username'   => $user->email
            ]);

            // Redirige al menú principal
            return redirect()->to('/menu');
        } else {
            // Redirige de vuelta al login con un mensaje de error
            session()->setFlashdata('error', 'Usuario o contraseña incorrectos');
            return redirect()->to('/login');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }
}
