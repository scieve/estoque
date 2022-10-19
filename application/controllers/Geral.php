<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Geral extends CI_Controller
{


	public function index()
	{
		if ($this->session->has_userdata('id_usuario')) {
			$this->menuInicial();
		} else {
			$this->quadroLogin();
		}
	}

	public function quadroLogin()
	{
		if ($this->session->has_userdata('id_usuario')) {
			$this->menuInicial();
		}

		$this->load->view('layouts/_header');
		$this->load->view('layouts/cabecalho');

		$this->load->view('usuarios/login');

		$this->load->view('layouts/rodape');
		$this->load->view('layouts/_footer');
	}

	public function menuInicial()
	{

		if (!$this->session->has_userdata('id_usuario')) {
			$this->quadroLogin();
		} else {
			redirect('gestao/home');
		}
	}

	public function verificarLogin()
	{
		if ($this->session->has_userdata('id_usuario')) {
			$this->menuInicial();
		} else {

			$this->load->model('usuarios');
			if ($this->usuarios->verificar_login()) {
				$this->menuInicial();
			} else {
				$this->loginInvalido();
			}
		}
	}

	public function loginInvalido()
	{
		if ($this->session->has_userdata('id_usuario')) {
			$this->menuInicial();
		} else {

			$this->load->view('layouts/_header');
			$this->load->view('layouts/cabecalho');

			$dados = [
				'mensagem'	=> 'Login inválido.',
				'tipo'		=> 'danger',
				'link'		=> 'geral'
			];


			$this->load->view('layouts/mensagem', $dados);
			$this->load->view('usuarios/login');
			$this->load->view('layouts/rodape');
			$this->load->view('layouts/_footer');
		}
	}

	public function logout()
	{
		if ($this->session->has_userdata('id_usuario')) {
			$this->session->unset_userdata('id_usuario');
			$this->session->unset_userdata('usuario');
		}

		$this->menuInicial();
	}

	public function setup()
	{

		$this->load->view('layouts/_header');
		$this->load->view('setup/setup');
		$this->load->view('layouts/_footer');
	}

	public function resetdb()
	{

		$this->load->model('basedados');
		$this->basedados->reset();

		$this->load->view('layouts/_header');
		$this->load->view('setup/setup');

		$dados = [
			'mensagem'	=> 'Sistema de base de dados reiniciado com sucesso.',
			'tipo'		=> 'success',
		];


		$this->load->view('layouts/mensagem', $dados);
		$this->load->view('layouts/_footer');
	}

	public function inserirusuarios()
	{

		$this->load->model('basedados');
		$this->basedados->inserir_usuarios();

		$this->load->view('layouts/_header');
		$this->load->view('setup/setup');

		$dados = [
			'mensagem'	=> 'Usuários inseridos com sucesso.',
			'tipo'		=> 'success',
		];


		$this->load->view('layouts/mensagem', $dados);
		$this->load->view('layouts/_footer');
	}

	public function inserirprodutos()
	{

		$this->load->model('basedados');
		$this->basedados->inserir_produtos();

		$this->load->view('layouts/_header');
		$this->load->view('setup/setup');

		$dados = [
			'mensagem'	=> 'Produtos inseridos com sucesso.',
			'tipo'		=> 'success',
		];


		$this->load->view('layouts/mensagem', $dados);
		$this->load->view('layouts/_footer');
	}
}
