<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Painel extends CI_Controller
{
    /*
   * Carregar helper, library, model.
   */
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->helper('array');
        $this->load->library('form_validation');
        $this->load->library('upload');
        $this->load->library('table');
        $this->load->library('session');
        $this->load->library('parser');
        $this->load->model('usuario_model'); // carregando o model ger_usuario_model
    }

    public function index()
    {
        $this->parser->parse('home_view');
    }


    /**
    * fun��o privata para setar urls listar e salvar
    */
    private function setURL(&$data) {
        $data['URLLISTAR']  = base_url('painel/painel');
        $data['HOME']       = base_url('home');
    }


    /**
    * fun��o publica para acidionar novo fornecedor
    * Variavel ACAO notificar a acao que sera ocorrida
    */
    public function painel(){

       $data                            = array();
       $data['ACAO']                    = 'Adicionar';
       $data['FORNECEDOR']              = 'Fornecedor';

       $this->setURL($data);

       $this->parser->parse('home_view', $data);
    }













}
