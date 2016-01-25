<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Produto_model extends CI_Model
{

    /**
     * função publica para inserir na tabela produto
     */
    public function adicionarProduto($itens) {
        $res = $this->db->insert('produto', $itens);
        if ($res) {
                return $this->db->insert_id();
        } else {
                return FALSE;
        }
    }
    
    
    public function listarProduto($condicao = array(), $primeiraLinha = FALSE) {
        $this->db->select(" a.*, DATE_FORMAT( dataproduto ,'%d/%m/%Y') AS dataproduto",FALSE);
        $this->db->select('t.nomecategoria as nomepai');
        $this->db->where($condicao);         
        $this->db->from('produto a');
        $this->db->join('categoria t', 't.idcategoria = a.idcategoria', 'LEFT');
        
        if ($primeiraLinha) {
                return $this->db->get()->first_row();
        } else {                   
                return $this->db->get()->result();
        }
    }
	
    
    public function editarProduto($itens, $idproduto)
    {
        $this->db->where('idproduto', $idproduto, FALSE);
        $res = $this->db->update('produto', $itens);
        if ($res) {
            return $idproduto;
        } else {
            return FALSE;
        }
    }
    
        
    public function excluirProduto($idproduto) {
        $this->db->where('idproduto', $idproduto, FALSE);
        return $this->db->delete('produto');
    }
        
       

}