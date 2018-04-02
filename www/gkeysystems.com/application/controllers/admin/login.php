<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
    {
        parent::__construct();        
    }

	public function index()
	{
        $session = $this->session->userdata("admin");
		if (!empty($session) && $session['username'] == "admin") {
            redirect(base_url()."admin/users");
        }
	    if ($this->input->post('username') && $this->input->post('password')){
            $this->load->model('admin/db_model');

            $username = trim($this->input->post('username'));
            $result   = $this->db_model->getData('users', array('username' => $username));
            $password = sha1(md5(trim($this->input->post('password'))));
            if (!empty($result) && $result[0]['password'] == $password ){
                $admin = array(
                    'admin' => array(
                        'username' => 'admin'
                        ) 
                    );
                $this->session->set_userdata($admin);
                redirect(base_url()."admin/users");
            }
        }
		$this->load->view('admin/login');
	}

	public function logout()
	{
        $this->session->sess_destroy("admin");
		redirect(base_url()."admin/login/index");
	}

}
