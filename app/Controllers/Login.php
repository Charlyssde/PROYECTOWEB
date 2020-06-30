<?php namespace App\Controllers;

use App\Models\UsuariosModel;

class Login extends BaseController
{
	public function index()
	{
        $data = [];
        helper(['form']);

        if($this->request->getMethod() == 'post') {
            $rules = [
                'nombreUsuario' => 'required|min_length[3]|max_length[50]',
                'password' => 'required|min_length[3]|max_length[50]|validateUser[nombreUsuario, password]',
            ];

            $errors = [
                'password' => [
                    'validateUser' => 'Nombre de usuario o contraseña incorrectos'
                ]
            ];

            if(! $this->validate($rules, $errors)) {
                $data['validation'] = $this->validator;
            } else {
                $model = new UsuariosModel;

                $user = $model->where('nombreUsuario', $this->request->getVar('nombreUsuario'))->first();
                $this->setUserSession($user);
                if($user['rol'] == 'admin') {
                    return redirect()->to('admin_usuarios');
                } else {
                    return redirect()->to('actividades');
                }
                
            }
        } 

        echo view('templates/header', $data);
        echo view('login');
        echo view('templates/footer');
    }

    private function setUserSession($user) {
        $data = [
            'idUsuario' => $user['idUsuario'],
            'nombre' => $user['nombre'],
            'nombreUsuario' => $user['nombreUsuario'],
            'correo' => $user['correo'],
            'password' => $user['password'],
            'rol' => $user['rol'],
            'isLoggedIn' => true
        ];

        session()->set($data);
        return true;
    }
    
    public function actividades() {
        $data = [];
        helper(['form']);

        echo view('templates/header', $data);
        echo view('actividades');
        echo view('templates/footer');
    }

    public function admin_usuarios()
	{
        $data = [];
        helper(['form']);

        $model = new UsuariosModel;
        $users = $model->findAll();
        $longitud = count($users);

        echo view('templates/header', $data);
        echo view('admin_usuarios');
        echo view('templates/footer');
    }
    
    public function register()
	{
        $data = [];
        helper(['form']);
        
        if($this->request->getMethod() == 'post') {
            $rules = [
                'nombre' => 'required|min_length[3]|max_length[200]',
                'nombreUsuario' => 'required|min_length[3]|max_length[50]',
                'correo' => 'required|min_length[6]|max_length[50]',
                'pwd' => 'required|min_length[3]|max_length[50]',
            ];

            if(! $this->validate($rules)) {
                $data['validation'] = $this->validator;
            } else {
                $model = new UsuariosModel();

                $newData = [
                    'nombre' => $this->request->getVar('nombre'),
                    'nombreUsuario' => $this->request->getVar('nombreUsuario'),
                    'correo' => $this->request->getVar('correo'),
                    'password' => $this->request->getVar('pwd'),
                    'rol' => $this->request->getVar('roles')
                ];
                $model->save($newData);
                $session = session();
                $session->setFlashdata('success', 'Registro exitoso');
                return redirect()->to('/');
            }
        }

        echo view('templates/header', $data);
        echo view('register');
        echo view('templates/footer');
	}

	//--------------------------------------------------------------------

}
