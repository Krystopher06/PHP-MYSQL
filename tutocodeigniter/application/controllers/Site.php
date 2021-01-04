<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Site extends CI_Controller
{
    public function index()
    {
        $data["title"] = "Page d'accueil";

        $this->load->view('common/header', $data);
        $this->load->view('site/index', $data);
        $this->load->view('common/footer', $data);
    }


    public function contact()
    {
        $this->load->helper("form");
        $this->load->library('form_validation');

        $data["title"] = "Contact";

        $this->load->view('common/header', $data);
        if ($this->form_validation->run()) {
            $this->load->library('email');
            $this->config->load('email', TRUE);
            $this->email->initialize($this->config->item('email'));
            $this->email->from($this->input->post('email'), $this->input->post('name'));
            $this->email->to('Krystopher.logez@hotmail.fr');
            $this->email->subject($this->input->post('title'));
            $this->email->message($this->input->post('message'));
            $this->email->send();
            $this->load->view('site/contact_result', $data);
        } else {
            $this->load->view('site/contact', $data);
        }
        $this->load->view('common/footer', $data);
    }

    public function apropos()
    {
        $data["title"] = "A propos de moi !";

        $this->load->view('common/header', $data);
        $this->load->view('site/apropos', $data);
        $this->load->view('common/footer', $data);
    }

    

    public function connexion()
    {
        $this->load->helper("form");
        $this->load->library('form_validation');

        $data["title"] = "Identification";

        if ($this->form_validation->run()) {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $this->auth_user->login($username, $password);
            if ($this->auth_user->is_connected) {
                redirect('index');
            } else {
                $data['login_error'] = "Échec de l'authentification";
            }
        }

        $this->load->view('common/header', $data);
        $this->load->view('site/connexion', $data);
        $this->load->view('common/footer', $data);
    }
    function deconnexion()
    {
        $this->auth_user->logout();
        redirect('index');
    }
}
class Panneau_de_controle extends CI_Controller {
    public function index() {
        if (!$this->auth_user->is_connected) {
            redirect('index');
        }
        $data["title"] = "Panneau de configuration";

        $this->load->view('common/header', $data);
        $this->load->view('dashboard/index', $data);
        $this->load->view('common/footer', $data);
    }
}
