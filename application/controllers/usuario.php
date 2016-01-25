<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuario extends CI_Controller
{

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
        $this->load->model('usuario_model'); // carregando o model usuario_model
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
        $data['URLLISTAR']  = base_url('usuario/listar');
        $data['ACAOFORM']   = base_url('usuario/salvar');
        $data['HOME']       = base_url('home');
    } 
    
    /**
    * função publica para acidionar novo usuario
    * Variavel ACAO notificar a acao que sera ocorrida
    */
    public function adicionar(){    

       $data                    = array();
       $data['ACAO']            = 'Adicionar';
       $data['USUARIO']         = 'Usuário';
       $data['idusuario']       = '';
       $data['usuario']         = '';
       $data['nomeusuario']     = '';
       $data['emailusuario']    = '';

       $this->setURL($data);
     
       $this->parser->parse('home_view', $data); 

    }
    
    
    
      /**
    * função publica para salvar novo usuario
    */
    public function salvar(){

        $idusuario      = $this->input->post('idusuario');
        $usuario        = $this->input->post('usuario');
        $nomeusuario    = $this->input->post('nomeusuario');
        $emailusuario   = $this->input->post('emailusuario');
        $senhausuario   = $this->input->post('senhausuario');       

        $erros          = FALSE;
        $mensagem       = null;


        if(!$usuario){
            $erros      = TRUE;
            $mensagem   .= "Informe nome do usuário\n";
        }
        if(!$nomeusuario){
            $erros      = TRUE;
            $mensagem   .= "Informe nome do usuário\n";
        }
        if(!$emailusuario){
            $erros      = TRUE;
            $mensagem   .= "Informe email do usuário\n";
        }
        if (!$senhausuario){
            if (!$idusuario){
                $erros      = TRUE;
                $mensagem   .= "Informe senha do usuário\n";
            }
        }

        if(!$erros){
            $itens  = array(
                "usuario"       => $usuario,
                "nomeusuario"   => $nomeusuario,
                "emailusuario"  => $emailusuario
            );
	    	    	    

            if($senhausuario){
                $itens['senhausuario']  = md5($senhausuario);
            }

            if($idusuario){
                $idusuario = $this->usuario_model->editarUsuario($itens, $idusuario);
            }else{
                $idusuario = $this->usuario_model->adicionarUsuario($itens);
            }

            if($idusuario) {
                $this->session->set_flashdata('sucesso', 'Dados inseridos com sucesso.');
                redirect('usuario/listar');
            } else {
                $this->session->set_flashdata('erro', 'Ocorreu um erro ao realizar a operação.');

                if ($idusuario) {
                    redirect('usuario/editar/'.$idusuario);
                } else {
                    redirect('usuario/adicionar');
                }
            }
        } else {
            $this->session->set_flashdata('erro', nl2br($mensagem));
            if ($idusuario) {
                redirect('usuario/editar/'.$idusuario);
            } else {
                redirect('usuario/adicionar');
            }
        }
    }
    
      
    
    
    /**
    * função publica listar usuários cadastrados
    */
    public function listar(){
       
        $data                   = array();
        $data['BLC_DADOS']      = array();
        $data['BLC_SEMDADOS']   = array(); 
        $data['ACAO']           = 'Listar';
        $data['USUARIO']        = 'Usuário';        
        $data['URLADICIONAR']   = base_url('usuario/adicionar');
        $data['URLLISTAR']      = base_url('usuario/listar');
        $data['HOME']           = base_url('home');

             

        $res   = $this->usuario_model->listarUsuario(array(), FALSE);


        if ($res) {
            foreach($res as $r) {
                $data['BLC_DADOS'][] = array(
                    "USUARIO"      => $r->usuario,
                    "NOMEUSUARIO"  => $r->nomeusuario,  
                    "EMAIL"        => $r->emailusuario,                              
                    "URLEDITAR"    => base_url('usuario/editar/'.$r->idusuario),
                    "URLEXCLUIR"   => base_url('usuario/excluir/'.$r->idusuario)
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
        $data['USUARIO']            = 'Usuário';
        $data['URLADICIONAR']       = base_url('usuario/adicionar');
        $data['URLLISTAR']          = base_url('usuario/listar');       

        $res    = $this->usuario_model->listarUsuario(array("idusuario" => $id), TRUE);

        if ($res) {
            foreach($res as $chave => $valor) {
                $data[$chave] = $valor;
            }
        }else {
            show_error('Não foram encontrados dados.', 500, 'Ops, erro encontrado.');
        }

        $this->setURL($data);
   
        $this->parser->parse('home_view', $data); 
       
    }

    
    
    /**
    * função publica para excluir usuario
    */
    public function excluir($id) {

        $res = $this->usuario_model->excluirUsuario($id);
        
        if ($res) {
            $this->session->set_flashdata('sucesso', 'Usuário removido com sucesso.');
            redirect('usuario/listar');
        } else {
            $this->session->set_flashdata('erro', 'Usuário não pode ser removido.');
        }        
        
    }

}    