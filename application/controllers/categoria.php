<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Categoria extends CI_Controller{

    public function __construct(){
	parent::__construct(); 
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->helper('array');
        $this->load->library('form_validation');
        $this->load->library('upload');
        $this->load->library('table');
        $this->load->library('session'); 
        $this->load->library('parser');
        $this->load->model('categoria_model'); // carregando o model usuario_model
    }


    /**
    * função publica index
    */
    public function index()
    {
        $this->parser->parse('home_view'); 
    } 
    
    /**
    * função privata para setar urls listar e salvar  
    */
    private function setURL(&$data){
        $data['URLLISTAR']  = base_url('categoria/listar');
        $data['ACAOFORM']   = base_url('categoria/salvar');
        $data['HOME']       = base_url('home');
    } 


    /**
    * função plublica para acidionar nova categoria
    * Variavel ACAO notificar a acao que sera ocorrida
    */
    public function adicionar(){    

       $data                            = array();
       $data['ACAO']                    = 'Adicionar';
       $data['CATEGORIA']  	        = 'Categoria';
       $data['idcategoria']            	= '';
       $data['nomecategoria']          	= '';

       $this->setURL($data);
     
       $this->parser->parse('home_view', $data);
    }
    
    
    /*
     * Funçao publica para salvar novo fornecedor
     */
    
    public function salvar(){
	
	$idcategoria 	= $this->input->post('idcategoria');
	$nomecategoria	= $this->input->post('nomecategoria');
	
	$erros 		= FALSE;
	$mensagem 	= null;
	
	
	if(!$nomecategoria){
	   $erros 	= TRUE;
	   $mensagem	.="Informe o nome da categoria\n";
	}
	
	if(!$erros){
	    $itens = array(
		"nomecategoria"	=> $nomecategoria
	    );
	    
	    if($idcategoria){
		$idcategoria = $this->categoria_model->editarCategoria($itens, $idcategoria);
	    }else{
		$idcategoria = $this->categoria_model->adicionarCategoria($itens);
	    }
	    
	    if($idcategoria){
		$this->session->set_flashdata('sucesso', 'Dados inseridos com sucesso.');
		redirect('categoria/listar');
	    }else{
		$this->session->set_flashdata('erro', 'Ocorreu um erro ao realizar a operação.');
		
		if($idcategoria){
		    redirect('categoria/editar/'.$idcategoria);
		}else{
		    redirect('categoria/adicionar');
		}
	    }
	}else{
	    $this->session->set_flashdata('erro', nl2br($mensagem));
	    if($idcategoria){
		redirect('categoria/editar/'.$idcategoria);
	    }else{
		redirect('categoria/adicionar');
	    }
	}
	
    }

	
	
     /**
    * função publica listar fornecedor cadastrados
    */
    public function listar(){
       
        $data                   = array();
        $data['BLC_DADOS']      = array();
        $data['BLC_SEMDADOS']   = array(); 
        $data['ACAO']           = 'Listar';
        $data['CATEGORIA']     	= 'Categoria';        
        $data['URLADICIONAR']   = base_url('categoria/adicionar');
        $data['URLLISTAR']      = base_url('categoria/listar');
        $data['HOME']           = base_url('home');

             
        $res   = $this->categoria_model->listarCategoria(array(), FALSE);


        if ($res) {
            foreach($res as $r) {
                $data['BLC_DADOS'][] = array(
                    "NOMECATEGORIA"            	=> $r->nomecategoria,
                    "URLEDITAR"                 => base_url('categoria/editar/'.$r->idcategoria),
                    "URLEXCLUIR"                => base_url('categoria/excluir/'.$r->idcategoria)
                );
            }
        } else {
            $data['BLC_SEMDADOS'][] = array();
        }  

        $this->parser->parse('home_view', $data);       
    }	
    
    /*
     * funçao para editar categoria
     */   
    public function editar($id)
    {
	$data			= array();
	$data['ACAO']		= 'Editar';
	$data['CATEGORIA']	= 'Categoria';
	$data['URLADICIONAR']   = base_url('categoria/adicionar');
        $data['URLLISTAR']      = base_url('categoria/listar');  
	
	
	$res = $this->categoria_model->listarCategoria(array("idcategoria" => $id), TRUE);
	
	if($res)
	{
	    foreach($res as $chave => $valor)
	    {
		$data[$chave] = $valor;
	    }
	}else{
	    show_erro('Não foram encontrados dados.', 500, 'Ops, erro encontrado.');
	}
	
	$this->setURL($data);
	
	$this->parser->parse('home_view', $data);
    }
    
    
    /*
     * função para excluir categoria
     */    
    public function excluir($id)
    {
	$res = $this->categoria_model->excluirCategoria($id);
	
	if($res){
	    $this->session->set_flashdata('sucesso', 'Categoria removida com sucesso.');
	    redirect('categoria/listar');
	}else{
	    $this->session->set_flashdata('erro', 'Categoria não pode ser removido.');
	}
    }
    
     
    
    
    
    
    
    
    
    
    
}