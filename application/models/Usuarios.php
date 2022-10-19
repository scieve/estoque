<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Usuarios extends CI_Model
{
    public function verificar_login()
    {

        // $parametros = [
        //     $this->input->post('text_usuario'),
        //     md5($this->input->post('text_senha'))
        // ];

        // $resultado = $this->db->query('SELECT * FROM usuarios WHERE usuario = ? AND senha = ?', $parametros);

        $this->db->from('usuarios');
        $this->db->where('usuario', $this->input->post('text_usuario'));
        $this->db->where('senha', md5($this->input->post('text_senha')));
        $resultado = $this->db->get();

        // $resultado = $this->db->from('usuarios')
        //     ->where('usuario', $this->input->post('text_usuario'))
        //     ->where('senha', md5($this->input->post('text_senha')))
        //     ->get();

        if ($resultado->num_rows() == 0) {
            return false;
        } else {
            $dados_usuario = $resultado->row();
            //$dados_usuario = $resultado->result_array();

            $this->session->set_userdata('id_usuario', $dados_usuario->id_usuario);
            $this->session->set_userdata('usuario', $dados_usuario->usuario);
            return true;
        }
    }
}
