<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gestao extends CI_Controller
{
    public function home()
    {
        if (!$this->session->has_userdata('id_usuario')) {
            redirect('geral/quadrologin');
        }

        $this->load->view('layouts/_header');
        $this->load->view('layouts/cabecalho');

        $this->load->model('stock');
        $dados['produtos'] = $this->stock->tudo();
        $this->load->view('stock/inicio', $dados);

        $this->load->view('layouts/rodape');
        $this->load->view('layouts/_footer');
    }

    public function editar($id)
    {
        $this->load->view('layouts/_header');
        $this->load->view('layouts/cabecalho');

        $this->load->model('stock');
        $dados['produtos'] = $this->stock->dados_produtos($id)[0];
        $this->load->view('stock/editar', $dados);

        $this->load->view('layouts/rodape');
        $this->load->view('layouts/_footer');
    }
}
