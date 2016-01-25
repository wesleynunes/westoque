<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Verificarlogin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('usuario_model', '', TRUE); // carrega model usuario
    }

    public function index()
    {
        $this->load->library('form_validation'); // biblioteca form_validation codeigniter
        
        $this->form_validation->set_rules('usuario', 'Usuario', 'trim|required|xss_clean');
        $this->form_validation->set_rules('senhausuario', 'Senha', 'trim|required|xss_clean|callback_check_database');
        
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('login_view'); // Validação de campo falhou. Usuário redirecionado para página de login
        } else {
            redirect('home', 'refresh'); // Vá para a área privada
        }
    }

    public function check_database($senhausuario)
    {
        $usuario = $this->input->post('usuario'); // Validacao do campo ok, validar banco
        
        $result = $this->usuario_model->login($usuario, $senhausuario); // consultar o banco de dados
        
        if ($result) {
            $sess_array = array();
            foreach ($result as $row) {
                $sess_array = array(
                    'idusuario' => $row->idusuario,
                    'usuario' => $row->usuario
                );
                $this->session->set_userdata('logged_in', $sess_array);
            }
            return TRUE;
        } else {
            $this->form_validation->set_message('check_database', 'usuario ou senha invalido');
            return false;
        }
    }
}