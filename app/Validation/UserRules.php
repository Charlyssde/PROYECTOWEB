<?php
namespace App\Validation;
use App\Models\UsuariosModel;

class UserRules {

    public function validateUser(string $str, string $fields, array $data) {
        $model = new UsuariosModel();
        $user = $model->where('nombreUsuario', $data['nombreUsuario'])->first();

        if (!$user) 
            return false;
        
        return password_verify($data['password'], $user['password']);
    }

}