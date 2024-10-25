<?php namespace App\Controllers;

use App\Models\CirugiaModel;
use App\Models\PacienteModel;

class CirugiasController extends BaseController {
    protected $cirugiaModel;
    protected $pacienteModel;

    public function __construct() {
        $this->cirugiaModel = new CirugiaModel();
        $this->pacienteModel = new PacienteModel();
    }

    public function index() {
        $data['cirugias'] = $this->cirugiaModel->findAll();
        $data['content_view'] = 'cirugias/index'; // Define la vista de contenido que deseas cargar en el menú
        return view('menu', $data); // Carga la vista del menú, pasando los datos y la vista de contenido
    }

    public function create() {
        $data['pacientes'] = $this->pacienteModel->findAll();
        $data['content_view'] = 'cirugias/create';
        return view('menu', $data);
    }
    

    public function store() {
        // Verifica que todos los datos sean recibidos correctamente
        $this->cirugiaModel->save([
            'id_paciente' => $this->request->getPost('id_paciente'),
            'descripcion' => $this->request->getPost('descripcion'),
            'id_medico' => $this->request->getPost('id_medico'),
            'fecha' => $this->request->getPost('fecha'),
            'sala' => $this->request->getPost('sala'), 
        ]);
        return redirect()->to('/cirugias');
    }
    
    

    public function edit($id) {
        $data['cirugia'] = $this->cirugiaModel->find($id);
    $data['pacientes'] = $this->pacienteModel->findAll();
    $data['content_view'] = 'cirugias/edit'; // Define la vista que deseas cargar en el menú
    return view('menu', $data); // Carga la vista del menú con el contenido de 'cirugias/edit'
    }

    public function update($id) {
        $this->cirugiaModel->update($id, [
            'id_paciente' => $this->request->getPost('id_paciente'),
            'descripcion' => $this->request->getPost('descripcion'),
            'id_medico' => $this->request->getPost('id_medico'),
            'fecha' => $this->request->getPost('fecha'),
            'sala' => $this->request->getPost('sala')
        ]);
        return redirect()->to('/cirugias'); // Redirige a la función index del controlador CirugiasController
    }
    

    public function delete($id) {
        $this->cirugiaModel->delete($id);
        return redirect()->to('/cirugias'); // Redirige a la función index para ver los cambios en la lista
    }
}

class PacientesController extends BaseController {
    protected $pacienteModel;

    public function __construct() {
        $this->pacienteModel = new PacienteModel();
    }

    public function index() {
        $data['pacientes'] = $this->pacienteModel->findAll();
        return view('pacientes/index', $data);
    }

    public function create() {
        return view('pacientes/create');
    }

    public function store() {
        // Asegúrate de que los campos que estás guardando coincidan con los de la base de datos
        $this->pacienteModel->save([
            'nombre' => $this->request->getPost('nombre'),
            'dni' => $this->request->getPost('dni'), // Asegúrate de tener este campo en el formulario
            'telefono' => $this->request->getPost('telefono'), // Asegúrate de tener este campo en el formulario
            'direccion' => $this->request->getPost('direccion') // Asegúrate de tener este campo en el formulario
        ]);
        return redirect()->to('/pacientes');
    }

    public function edit($id) {
        $data['paciente'] = $this->pacienteModel->find($id);
        return view('pacientes/edit', $data);
    }

    public function update($id) {
        $this->pacienteModel->update($id, [
            'nombre' => $this->request->getPost('nombre'),
            'dni' => $this->request->getPost('dni'), // Asegúrate de tener este campo en el formulario
            'telefono' => $this->request->getPost('telefono'), // Asegúrate de tener este campo en el formulario
            'direccion' => $this->request->getPost('direccion') // Asegúrate de tener este campo en el formulario
        ]);
        return redirect()->to('/pacientes');
    }

    public function delete($id) {
        $this->pacienteModel->delete($id);
        return redirect()->to('/pacientes');
    }
}

?>