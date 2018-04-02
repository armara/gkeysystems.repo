<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Register extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $session = $this->session->userdata("admin");
        if (empty($session) || $session['username'] != "admin") {
            redirect(base_url()."admin/login/index");
        }
        $this->load->model('admin/db_model');
        
    }

	public function index()
	{

		$this->load->templateAdmin('register');
	}

    public function add_new_user()
    {
        if ($this->input->post()){
            if ($this->input->post('first_name') && $this->input->post('last_name') && $this->input->post('email') && $this->input->post('ip_adress') && $this->input->post('password') && $this->input->post('db_type')){
                $my_error = '';

                $first_name = trim($this->input->post('first_name'));
                if (empty($first_name)) {
                    $my_error['error']['first_name'] = "First Name is required !";
                }
                $last_name = trim($this->input->post('last_name'));
                if (empty($last_name)) {
                    $my_error['error']['last_name'] = "Last Name is required !";
                }
                $email = trim($this->input->post('email'));
                if (empty($email)) {
                    $my_error['error']['email'] = "E-mail is required !";
                }else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $my_error['error']['email'] = "E-mail not valid !";
                }
                $ip = trim($this->input->post('ip_adress'));
                if (empty($ip)) {
                    $my_error['error']['ip_adress'] = "IP Adress is required !";
                }else if (!filter_var($ip, FILTER_VALIDATE_IP)) {
                    $my_error['error']['ip_adress'] = "IP Adress not valid !";
                }
                $password = trim($this->input->post('password'));
                if (empty($password)) {
                    $my_error['error']['password'] = "Password is required !";
                }else if ( strlen($password) < 6) {
                    $my_error['error']['password'] = "Min: 6 characters !";
                }
                $db_type = trim($this->input->post('db_type'));
                if (empty($db_type)) {
                    $my_error['error']['db_type'] = "DB Type is required !";
                }else if (!is_numeric($db_type)) {
                    $my_error['error']['db_type'] = "DB Type not valid !";
                }
                $connect_name = trim($this->input->post('connect_name'));
                if (empty($connect_name)) {
                    $my_error['error']['connect_name'] = "Connect name is required !";
                }
                $port = trim($this->input->post('port'));
                if (empty($port)) {
                    $my_error['error']['port'] = "Port is required !";
                }else if (!is_numeric($port)) {
                    $my_error['error']['port'] = "Port not valid !";
                }
                $db_name = trim($this->input->post('db_name'));
                if (empty($db_name)) {
                    $my_error['error']['db_name'] = "DB_name is required !";
                }
                $db_username = trim($this->input->post('DB_username'));
                if (empty($db_username)) {
                    $my_error['error']['db_username'] = "DB_username is required !";
                }
                $db_pass = trim($this->input->post('db_pass'));
                if (empty($db_pass)) {
                    $my_error['error']['db_pass'] = "DB_pass is required !";
                }else if ( strlen($password) < 6) {
                    $my_error['error']['password'] = "Min: 6 characters !";
                }

                if(!empty($my_error)){
                    die(json_encode($my_error));
                }
                $password = mysql_real_escape_string( htmlspecialchars( trim($this->input->post('password')) ));
                $new_user_data = array(
                    'first_name'    => mysql_real_escape_string( htmlspecialchars( $first_name )),
                    'last_name'     => mysql_real_escape_string( htmlspecialchars( $last_name )),
                    'email'         => mysql_real_escape_string( htmlspecialchars( $email )),
                    'password'      => sha1(md5( $password )),
                    'register_date' => date("Y-m-d  H:i:s"),
                );

                $result = $this->db_model->insert('users', $new_user_data);
                
                $result_user = $this->db_model->getData('users', array('email' => mysql_real_escape_string( htmlspecialchars( $email ) ) ));
                
                if (!empty($result_user) && sha1(md5($password)) == $result_user[0]['password'] ){
                    $user_id = $result_user[0]['id'];
                }
                
                $new_connect = array(
                    
                    'connect_name' => mysql_real_escape_string( htmlspecialchars( $connect_name )),
                    'user_id'      => $user_id,
                    'db_type'      => mysql_real_escape_string( htmlspecialchars(  trim($this->input->post('db_type')) )),
                    'ip'           => mysql_real_escape_string( htmlspecialchars( $ip )),
                    'port'         => mysql_real_escape_string( htmlspecialchars( $port )),
                    'db_name'      => mysql_real_escape_string( htmlspecialchars( $db_name)),
                    'db_username'  => mysql_real_escape_string( htmlspecialchars( $db_username)),
                    'db_pass'      => sha1(md5( $db_pass )),
                    
                );
                
                $result2 = $this->db_model->insert('connections', $new_connect);
                die($result);
            }
        }
        die("Don't try to bypass system !");

    }
	
}
