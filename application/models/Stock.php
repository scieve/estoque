<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Stock extends CI_Model
{
    public function tudo()
    {

        return $this->db->get('produtos')->result_array();
    }

    public function dados_produto()
    {

        echo 'Dados do Produto';
    }
}
