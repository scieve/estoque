<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Basedados extends CI_Model
{


    public function reset()
    {

        $this->db->empty_table('usuarios');
        $this->db->empty_table('movimentos');
        $this->db->empty_table('produtos');

        $this->db->query("SELECT setval('produtos_id_produto_seq', 1, false)");
        $this->db->query("SELECT setval('movimentos_id_movimento_seq', 1, false)");
        $this->db->query("SELECT setval('usuarios_id_usuario_seq', 1, false)");
    }

    public function inserir_usuarios()
    {

        $this->db->empty_table('usuarios');
        $this->db->query("SELECT setval('usuarios_id_usuario_seq', 1, false)");

        $dados = [
            'usuario' => 'admin',
            'senha'   => md5('admin')

        ];
        $this->db->insert('usuarios', $dados);

        $dados = [
            'usuario' => 'ana',
            'senha'   => md5('ana')

        ];
        $this->db->insert('usuarios', $dados);

        $dados = [
            'usuario' => 'rui',
            'senha'   => md5('rui')

        ];
        $this->db->insert('usuarios', $dados);
    }

    public function inserir_produtos()
    {

        $this->db->empty_table('movimentos');
        $this->db->query("SELECT setval('movimentos_id_movimento_seq', 1, false)");
        $this->db->empty_table('produtos');
        $this->db->query("SELECT setval('produtos_id_produto_seq', 1, false)");

        $dados = [
            ['designacao' => 'CPUS',      'quantidade' => 10],
            ['designacao' => 'Memórias',  'quantidade' => 10],
            ['designacao' => 'Monitores', 'quantidade' => 10],
            ['designacao' => 'HDs',       'quantidade' => 10],


        ];
        $this->db->insert_batch('produtos', $dados);



        $dados = [
            ['id_produto' => 1, 'quantidade' => 10,      'data_hora' => date('Y-m-d H:m:s')],
            ['id_produto' => 2, 'quantidade' => 10,      'data_hora' => date('Y-m-d H:m:s')],
            ['id_produto' => 3, 'quantidade' => 10,      'data_hora' => date('Y-m-d H:m:s')],
            ['id_produto' => 4, 'quantidade' => 10,      'data_hora' => date('Y-m-d H:m:s')],


        ];
        $this->db->insert_batch('movimentos', $dados);
    }
}
