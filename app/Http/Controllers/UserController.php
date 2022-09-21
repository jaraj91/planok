<?php

namespace App\Http\Controllers;

use App\DataTransferObjects\UserDTO;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController
{
    public function index(Request $request)
    {
        $users = DB::table('usuario As u')
            ->select('u.nombre', 'u.apellido', 'u.rut', 'u.edad', 'u.sexo', 'u.correo', 'u.estado', 'p.descripcion as perfil')
            ->leftJoin('perfil AS p', 'u.idPerfil', '=', 'p.idPerfil')
            ->paginate(5)
            ->through(function(object $data) {
                return new UserDTO(
                    firstName: $data->nombre,
                    lastName: $data->apellido,
                    rut: $data->rut,
                    age: $data->edad,
                    sex: $data->sexo,
                    email: $data->correo,
                    status: $data->estado,
                    profile: $data->perfil,
                );
            });

        return view('users', compact('users'));
    }
}
