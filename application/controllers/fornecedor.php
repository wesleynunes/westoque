<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Fornecedor extends CI_Controller{

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
        $this->load->model('fornecedor_model'); // carregando o model usuario_model
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
        $data['URLLISTAR']  = base_url('fornecedor/listar');
        $data['ACAOFORM']   = base_url('fornecedor/salvar');
        $data['HOME']       = base_url('home');
    } 


    /**
    * função publica para acidionar novo fornecedor
    * Variavel ACAO notificar a acao que sera ocorrida
    */
    public function adicionar(){    

       $data                            = array();
       $data['ACAO']                    = 'Adicionar';
       $data['FORNECEDOR']              = 'Fornecedor';
       $data['idfornecedor']            = '';
       $data['cnpjfornecedor']          = '';
       $data['razaosocialfornecedor']   = '';
       $data['emailfornecedor']         = '';
       $data['telefonefornecedor']      = '';

       $this->setURL($data);
     
       $this->parser->parse('home_view', $data);
    }


      /**
    * função publica para salvar novo fornecedor
    */
    public function salvar(){

        $idfornecedor           = $this->input->post('idfornecedor');
        $cnpjfornecedor         = $this->input->post('cnpjfornecedor');
        $razaosocialfornecedor  = $this->input->post('razaosocialfornecedor');
        $emailfornecedor        = $this->input->post('emailfornecedor');
        $telefonefornecedor     = $this->input->post('telefonefornecedor');       

        $erros          = FALSE;
        $mensagem       = null;


        if(!$cnpjfornecedor){
            $erros      = TRUE;
            $mensagem   .= "Informe o cnpj do fornecedor\n";
        }
        if(!$razaosocialfornecedor){
            $erros      = TRUE;
            $mensagem   .= "Informe a razao social do fornecedor\n";
        } 

        if(!$emailfornecedor){
            $erros      = TRUE;
            $mensagem   .= "Informe o e-mail do fornecedor\n";
        } 


        if(!$telefonefornecedor){
            $erros      = TRUE;
            $mensagem   .= "Informe o telefonefornecedor\n";
        } 
        
        if(!$erros){
            $itens  = array(
                "cnpjfornecedor"            => $cnpjfornecedor,
                "razaosocialfornecedor"     => $razaosocialfornecedor,
                "emailfornecedor"           => $emailfornecedor,
                "telefonefornecedor"        => $telefonefornecedor
            );            

            if($idfornecedor){
                $idfornecedor = $this->fornecedor_model->editarFornecedor($itens, $idfornecedor);
            }else{
                $idfornecedor = $this->fornecedor_model->adicionarFornecedor($itens);
            }

            if($idfornecedor) {
                $this->session->set_flashdata('sucesso', 'Dados inseridos com sucesso.');
                redirect('fornecedor/listar');
            } else {
                $this->session->set_flashdata('erro', 'Ocorreu um erro ao realizar a operação.');

                if ($idfornecedor) {
                    redirect('fornecedor/editar/'.$idfornecedor);
                } else {
                    redirect('fornecedor/adicionar');
                }
            }
        } else {
            $this->session->set_flashdata('erro', nl2br($mensagem));
            if ($idfornecedor) {
                redirect('fornecedor/editar/'.$idfornecedor);
            } else {
                redirect('fornecedor/adicionar');
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
        $data['FORNECEDOR']     = 'Fornecedor';        
        $data['URLADICIONAR']   = base_url('fornecedor/adicionar');
        $data['URLLISTAR']      = base_url('fornecedor/listar');
        $data['HOME']           = base_url('home');

             
        $res   = $this->fornecedor_model->listarFornecedor(array(), FALSE);


        if ($res) {
            foreach($res as $r) {
                $data['BLC_DADOS'][] = array(
                    "CNPJFORNECEDOR"            => $r->cnpjfornecedor,
                    "RAZAOSOCIALFORNECEDOR"     => $r->razaosocialfornecedor,  
                    "EMAILFORNECEDOR"           => $r->emailfornecedor,
                    "TELEFONEFORNECEDOR"        => $r->telefonefornecedor,                              
                    "URLEDITAR"                 => base_url('fornecedor/editar/'.$r->idfornecedor),
                    "URLEXCLUIR"                => base_url('fornecedor/excluir/'.$r->idfornecedor)
                );
            }
        } else {
            $data['BLC_SEMDADOS'][] = array();
        }  

        $this->parser->parse('home_view', $data);       
    }
        
        
    /**
    * função publica editar usuários cadastrados
    */
    public function editar($id){
       
        $data                       = array();
        $data['ACAO']               = 'Editar';
        $data['FORNECEDOR']         = 'Fornecedor';
        $data['URLADICIONAR']       = base_url('fornecedor/adicionar');
        $data['URLLISTAR']          = base_url('fornecedor/listar');       

        $res    = $this->fornecedor_model->listarFornecedor(array("idfornecedor" => $id), TRUE);

        if($res){
            foreach($res as $chave => $valor){
                $data[$chave] = $valor;
            }
        }else{
            show_error('Não foram encontrados dados.', 500, 'Ops, erro encontrado.');
        }

        $this->setURL($data);
   
        $this->parser->parse('home_view', $data); 
    }
         
    
    
    /**
    * função publica para excluir usuario
    */
    public function excluir($id) {

        $res = $this->fornecedor_model->excluirFornecedor($id);
        
        if ($res) {
            $this->session->set_flashdata('sucesso', 'Fornecedor removido com sucesso.');
            redirect('fornecedor/listar');
        } else {
            $this->session->set_flashdata('erro', 'Fornecedor não pode ser removido.');
        }    
    }
    
    
}