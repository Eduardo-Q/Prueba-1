<?php namespace App\Controllers;

use CodeIgniter\Controller;

class MenuController extends Controller
{
    public function index()
    {
        // Verificar si el usuario ha iniciado sesión
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login');
        }

        $data['content_view'] = 'cirugias/index'; // O el contenido que desees mostrar
        return view('menu', $data);
    }
}
