<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Produto extends CI_Controller{

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
        $this->load->model('produto_model'); // carregando o model usuario_model
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
    private function setURL(&$data) {
        $data['URLLISTAR']  = base_url('produto/listar');
        $data['ACAOFORM']   = base_url('produto/salvar');
        $data['HOME']       = base_url('home');
    } 


    /**
    * função publica para acidionar nova categoria
    * Variavel ACAO notificar a acao que sera ocorrida
    */     
    public function adicionar()
    {   
	$data				= array();
	$data['BLC_CATEGORIA']		= array();
	$data['ACAO']			= 'Adicionar';
	$data['PRODUTO']  	        = 'Produto';      
	$data['idproduto']		= '';
	$data['nomeproduto']		= '';
	$data['dataproduto']		= '';
	
	     
	$tipo = $this->categoria_model->listarCategoria(array(), FALSE, 0, FALSE);
    
       	foreach($tipo as $t)
	{
	    $data['BLC_CATEGORIA'][] = array
	    (
		"IDCATEGORIA"		=> $t->idcategoria,
		"NOMECATEGORIA"		=> $t->nomecategoria,
		"sel_idcategoria"	=> null
	    );
	}
	       
	$this->setURL($data);
 
	$this->parser->parse('home_view', $data);
    }
   
     
     public function salvar()
     {	 
	 $idproduto		= $this->input->post('idproduto');
	 $nomeproduto		= $this->input->post('nomeproduto');
	 $dataproduto		= $this->input->post('dataproduto');
	 $idcategoria		= $this->input->post('idcategoria');
     
	 $erros			= FALSE;
	 $mensagem		= null;  
	 
	 $data = explode("/",$dataproduto);
	 
	 $databrasil = $data[2]."-".$data[1]."-".$data[0]; // formatar data para y/m/d
	 
     	 if (!$nomeproduto)
	 {
		 $erros		= TRUE;
		 $mensagem	.= "Informe nome do produto.\n";
	 }
	 
	 if (!$dataproduto)
	 {
		 $erros		= TRUE;
		 $mensagem	.= "Informe a data do produto.\n";
	 }
	 
	 if (!$idcategoria) {
		 $erros		= TRUE;
		 $mensagem	.= "Informe a categoria do produto.\n";
	 }
	 
	 if (!$erros) {
		 $itens	= array
		 (
				 "nomeproduto"		=> $nomeproduto,
				 "dataproduto"		=> $databrasil,
				 "idcategoria"		=> $idcategoria
		 );
			 
			 
		 if ($idproduto) {
			 $idproduto = $this->produto_model->editarProduto($itens, $idproduto);
		 } else {
			 $idproduto = $this->produto_model->adicionarProduto($itens);
		 }
			 
		 if ($idproduto) {
			 $this->session->set_flashdata('sucesso', 'Produto inseridos com sucesso.');
			 redirect('produto/listar');
		 } else {
			 $this->session->set_flashdata('erro', 'Ocorreu um erro ao realizar a operação.');
     
			 if ($idproduto) {
				 redirect('produto/editar'.$idproduto);
			 } else {
				 redirect('produto/adicionar');
			 }
		 }
	 } else {
		 $this->session->set_flashdata('erro', nl2br($mensagem));
		 if ($idproduto) {
			 redirect('produto/editar/'.$idproduto);
		 } else {
			 redirect('produto/adicionar');
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
        $data['PRODUTO']   	= 'Produto';        
        $data['URLADICIONAR']   = base_url('produto/adicionar');
        $data['URLLISTAR']      = base_url('produto/listar');
        $data['HOME']           = base_url('home');

        $res   = $this->produto_model->listarProduto(array(), FALSE);

        if ($res) {
            foreach($res as $r) {
                $data['BLC_DADOS'][] = array(
                    "NOMEPRODUTO"            	=> $r->nomeproduto,
		    "DATAPRODUTO"		=> $r->dataproduto,
                    "NOMETIPO"			=> (empty($r->nomepai))?'-':$r->nomepai,
                    "URLEDITAR"                 => base_url('produto/editar/'.$r->idproduto),
                    "URLEXCLUIR"                => base_url('produto/excluir/'.$r->idproduto)
                );
            }
        } else {
            $data['BLC_SEMDADOS'][] = array();
        }  

        $this->parser->parse('home_view', $data);       
    }
              
	          
           
    public function editar($id) {
	    $data				= array();	   
	    $data['BLC_CATEGORIA']		= array();
	     $data['ACAO']			= 'Edição';
	    $data['Produto']     	    	= 'Produto';
	    $data['URLADICIONAR']      		= base_url('produto/adicionar');
	    $data['URLLISTAR']          	= base_url('produto/listar'); 
	    
	    //INFORMAÇÕES DO ATRIBUTO
	    $res = $this->produto_model->listarProduto(array("a.idproduto" => $id), TRUE);
    
	    if ($res) {
		    foreach($res as $chave => $valor) {
			    $data[$chave] = $valor;
		    }
	    } else {
		    show_error('Não foram encontrados dados.', 500, 'Ops, erro encontrado.');
	    }
    
	    //TIPOS DO ATRIBUTO
	    $tipo	= $this->categoria_model->listarCategoria(array(), FALSE, 0, FALSE);
    
	    foreach($tipo as $t){
		$data['BLC_CATEGORIA'][] = array(
				"IDCATEGORIA"		=> $t->idcategoria,
				"NOMECATEGORIA"		=> $t->nomecategoria,
				"sel_idcategoria"	=> ($res->idcategoria==$t->idcategoria)?'selected="selected"':null
		);
	    }
    
	    $this->setURL($data);
    
	    $this->parser->parse('home_view', $data);   
    }
     
       
          
    public function excluir($id) {
    
	$res = $this->produto_model->excluirProduto($id);
	
	if ($res) {
	    $this->session->set_flashdata('sucesso', 'Produto removido com sucesso.');
	    redirect('produto/listar');
	} else {
	    $this->session->set_flashdata('erro', 'Produto não pode ser removido.');
	}    
    }
     
 
   
}