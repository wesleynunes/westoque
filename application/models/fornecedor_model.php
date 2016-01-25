<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Fornecedor_model extends CI_Model
{

    /**
     * função publica para inserir fornecedor 
     */
    public function adicionarFornecedor($itens)
    {
        $res = $this->db->insert('fornecedor', $itens);
        
        if ($res) {
            return $this->db->insert_id();
        } else {
            return FALSE;
        }
    }

    /**
     * função publica para fazer select na tabela fornecedor
     */
    public function listarFornecedor($condicao = array(), $primeiraLinha = FALSE)
    {
        $this->db->select('idfornecedor, cnpjfornecedor, razaosocialfornecedor, emailfornecedor, telefonefornecedor');
        $this->db->where($condicao);
        $this->db->from('fornecedor');  
        
        if ($primeiraLinha) {
            return $this->db->get()->first_row();
        } else {
            return $this->db->get()->result();
        }
    }

   
     /**
     * função publica para editar fornecedor (update)
     */
    public function editarFornecedor($itens, $idfornecedor)
    {
        $this->db->where('idfornecedor', $idfornecedor, FALSE);
        $res = $this->db->update('fornecedor', $itens);
        if ($res) {
            return $idfornecedor;
        } else {
            return FALSE;
        }
    }

    
     /**
     * função publica para excluir fornecedor
     */
    public function excluirFornecedor($idfornecedor)
    {
        $this->db->where('idfornecedor', $idfornecedor, FALSE);
        return $this->db->delete('fornecedor');
    }
    
    
} 