<?php

namespace App\Controllers;
use App\Libraries\PHPMailer_Lib;

class Home extends BaseController
{
	public function index()
	{
		return view('home');
	}

	public function contacto(){
		return view('contacto');
	}

	public function contacto_validar(){
		$validation = service('validation');
		$validation->setRules([
			'correo'    => 'required|valid_email',
			'nombre' 	=> 'required|min_length[2]|max_length[30]',
			'mensaje' 	=> 'required|min_length[20]|max_length[200]'
		]);

		if(!$validation->withRequest($this->request)->run()){
			return redirect()->back()->withInput()->with('errors', $validation->getErrors());
		}else{
			//enviar Email
		    $nombre = $this->request->getPost('nombre');
			$correo = $this->request->getPost('correo');
			$mensaje = $this->request->getPost('mensaje');
			$email = new PHPMailer_Lib;
			$mensaje= $email->send($nombre, $correo, $mensaje);
			return redirect()->to('contacto')->with('msg', [
				'type' => 'success',
				'body' => $mensaje
			]);
		}
	}
}
