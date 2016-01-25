<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

session_start();

class Home extends CI_Controller
{
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
        $this->load->model('fornecedor_model'); // carregando o model usuario_model
    }

    public function index()
    {
        if ($this->session->userdata('logged_in')){
            $session_data = $this->session->userdata('logged_in');
            $dados['usuario'] = $session_data['usuario'];
            $this->load->view('home_view', $dados);       
        } else {
            redirect('login', 'refresh'); // Se nenhuma sessão, redirecionar a página de login
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('logged_in');
        session_destroy();
        redirect('home', 'refresh');
    }
}