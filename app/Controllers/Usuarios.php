<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Usuario;
use App\Libraries\Hash;

class Usuarios extends BaseController
{
	public function __construct(){
		helper(['url','form']);
	}

	public function login()
	{
		return view('usuarios/login');
	}

	public function validar_login(){
		$usuario = new Usuario();
		//verificar usuario para loguearse (iniciar session)
		$usuario = new Usuario; 
		$validation = $this->validate([
			'usuario'=>[
				'rules'=>'required',
				'errors'=>[
					'required'=>"Debe Escribir el Nombre del Usuario",
					'is_not_unique'=>"Usuario no esta Registrado"
				]
			],
			'clave'=>[
				'rules'=>'required|min_length[5]|max_length[10]',
				'errors'=>[
					'required'=>"Debe escribir una Clave",
					'min_length'=>"Clave no puede ser menor a 5 digitos",
					'max_length'=>"Clave no puede ser mayor a 12 digitos"
				]
			]		
		]);
		if(!$validation){
			return view('usuarios/login', ['validation'=>$this->validator]);
		}else{
			$user = $this->request->getPost('usuario');
			$clave = $this->request->getPost('clave');
			$user_info = $usuario->where('usuario', $user)->first();
			if($user_info){
			
				$check_password = Hash::check($clave, $user_info['clave']);

				if(!$check_password){
					session()->setFlashdata('fail', 'Clave Incorrecta');
					return redirect()->to('usuarios/login')->withInput();
				}else{
					$user_session = $user_info['usuario'];
					//session()->set('loggerUser', $user_session);
					session()->set([
						'username' => $user_session,
						'is_logged'=> true
					]);
					return redirect()->to('/');
				}
			}else{
				session()->setFlashdata('fail', 'Usuario No existe');
				return redirect()->to('usuarios/login')->withInput();
			}
		}
	}

	public function registrarse(){
		return view('usuarios/registrarse');
	}

	public function grabar_usuario(){
		$usuario = new Usuario();
		$validation = service('validation');
		$validation->setRules([
			'usuario'    => 'required|is_unique[usuarios.usuario]',
			'correo'    => 'required|valid_email|is_unique[usuarios.correo]',
			'clave' 	=> 'required',
			'clave1' 	=> 'required|matches[clave]',
			'nombre' 	=> 'required',
			'telefono' 	=> 'required'
		]);

		if(!$validation->withRequest($this->request)->run()){
			return redirect()->back()->withInput()->with('errors', $validation->getErrors());
		}else{
			$passw =  $this->request->getPost('clave');
			$usuario->insert(
				[
					'usuario' 	=>$this->request->getPost('usuario'),
					'clave'		=> Hash::make($passw),
					//'clave'		=> $this->request->getPost('clave'),
					'correo' 	=> $this->request->getPost('correo'),	
					'nombre' 	=> $this->request->getPost('nombre'),	
					'fecha' 	=> date('Y-m-d H:i:s'),
					'telefono'	=> $this->request->getPost('telefono')
				]
			);
			return redirect()->to('usuarios/login')->with('msg', [
				'type' => 'success',
				'body' => 'Usuario Registrado con Exito!'
			]);
		}
	}

	public function logout() {
		if(session()->has('username')){
			session()->remove('username');
			session()->remove('is_logged');
			//session()->destroy();
			return redirect()->to('usuarios/login?access=out')->with('fail', 'logger out!');
		}
	}

}

