<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Categoria_model extends CI_Model
{

    /**
     * fun��o publica para inserir Categoria 
     */
    public function adicionarCategoria($itens)
    {
        $res = $this->db->insert('categoria', $itens);
        
        if ($res) {
            return $this->db->insert_id();
        }else{
            return FALSE;
        }
    }

    
     /*
     * fun��o publica para fazer select na tabela categoria
     */    
    public function listarCategoria($condicao = array(), $primeiraLinha =  FALSE)
    {
        $this->db->select('idcategoria, nomecategoria');
        $this->db->where($condicao);
        $this->db->from('categoria');
        
        if($primeiraLinha)
        {
            return $this->db->get()->first_row();
        }else{
            return $this->db->get()->result();
        }    
    }
    
    /*
     * fun�ao publica para fazer update na tabela categoria
     */   
    public function editarCategoria($itens, $idcategoria)
    {
        $this->db->where('idcategoria', $idcategoria, FALSE);
        $res = $this->db->update('categoria', $itens);
        if($res){
            return $idcategoria;
        }else{
            return FALSE;
        }
    }
    
    
    /*
     * fun��o publica para excluir categoria
     */    
    public function excluirCategoria($idcategoria)
    {
        $this->db->where('idcategoria', $idcategoria, FALSE);
        return $this->db->delete('categoria');
    }
    
    
} 