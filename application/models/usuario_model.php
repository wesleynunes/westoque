<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuario_model extends CI_Model
{
    
    /**
     * função para validar usuario e senha
     */
    public function login($usuario, $senhausuario)
    {
        $this->db->select('idusuario, usuario, senhausuario');
        $this->db->from('usuario');
        $this->db->where('usuario = ' . "'" . $usuario . "'");
        $this->db->where('senhausuario = ' . "'" . MD5($senhausuario) . "'");
        $this->db->limit(1);
        $query = $this->db->get();
        
        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }
    

    /**
     * função publica para inserir usuario na tabela usuarios
     */
    public function adicionarUsuario($itens)
    {
        $res = $this->db->insert('usuario', $itens);
        
        if ($res) {
            return $this->db->insert_id();
        } else {
            return FALSE;
        }
    }

    /**
     * função publica para fazer select na tabela usuarios
     */
    public function listarUsuario($condicao = array(), $primeiraLinha = FALSE)
    {
        $this->db->select('idusuario, usuario, nomeusuario, emailusuario');
        $this->db->where($condicao);
        $this->db->from('usuario');
        
        if ($primeiraLinha) {
            return $this->db->get()->first_row();
        } else {
            return $this->db->get()->result();
        }
    }

    /**
     * função publica para excluir usuário
     */
    public function excluirUsuario($idusuario)
    {
        $this->db->where('idusuario', $idusuario, FALSE);
        return $this->db->delete('usuario');
    }

    /**
     * função publica para editar usuario (update)
     */
    public function editarUsuario($itens, $idusuario)
    {
        $this->db->where('idusuario', $idusuario, FALSE);
        $res = $this->db->update('usuario', $itens);
        if ($res) {
            return $idusuario;
        } else {
            return FALSE;
        }
    }
} 