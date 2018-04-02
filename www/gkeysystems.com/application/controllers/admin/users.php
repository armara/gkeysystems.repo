<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {

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
        $result = $this->db_model->get('users');
        $users_data = [];
        foreach ($result as $key => $value){
            if (empty($value['username'])) {
                $users_data[] = array(
                            'id'            => $result[$key]['id'],
                            'full_name'     => $result[$key]['first_name'].' '.$result[$key]['last_name'],
                            'email'         => $result[$key]['email'],
//                            'ip_adress'     => $result[$key]['ip'],
//                            'avatar'        => $result[$key]['db_type'],
                            'edit_delete'   => '<button type="button" class="btn btn-warning show_user"  data-id="'.$value['id'].'" data-toggle="modal" data-target="#show_user"><i class="fa fa-eye" style=" color: #383333; font-size: 18px;"></i></button><button type="button" class="btn btn-danger remove" data-id="'.$value['id'].'" style="margin-left: 10px"><i class="glyphicon glyphicon-remove"></i></button>',
                        );
                }
        }

        $users_data['users'] = $users_data;
        $this->load->templateAdmin('users', $users_data);
	}

    public function get_user_data()
    {
        if($this->input->post('id') && is_numeric($this->input->post('id'))){
            $result = $this->db_model->getData('users', array("id" => $this->input->post('id')));
            $user_data = array(
                'id'         => $result[0]['id'],
                'first_name' => $result[0]['first_name'],
                'last_name'  => $result[0]['last_name'],
                'email'      => $result[0]['email'],
//                'ip_adress'  => $result[0]['ip'],
//                'db_type'    => $result[0]['db_type'],
            );
            echo json_encode($user_data);
        }else{
            die("Don't try to bypass system !");
        }
    }

    public function edit_user_data()
    {
        if($this->input->post()){
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
            if (!empty($password) && strlen($password) < 6) {
                $my_error['error']['password'] = "Min: 6 characters !";
            }
            $db_type = trim($this->input->post('db_type'));
            if (empty($db_type)) {
                $my_error['error']['db_type'] = "DB Type is required !";
            }else if (!is_numeric($db_type)) {
                $my_error['error']['db_type'] = "IP Adress not valid !";
            }

            
            if(!empty($my_error)){
                die(json_encode($my_error));
            }
                    
            $user_data = array(
                'first_name' => mysql_real_escape_string( htmlspecialchars( $first_name ) ),
                'last_name'  => mysql_real_escape_string( htmlspecialchars( $last_name ) ),
                'email'      => mysql_real_escape_string( htmlspecialchars( $email ) ),
                'password'   => sha1(md5( mysql_real_escape_string( htmlspecialchars( $password ) ) )),
//                'ip'         => mysql_real_escape_string( htmlspecialchars( $ip ) ),
//                'db_type'    => mysql_real_escape_string( htmlspecialchars( $db_type ) )
            );
            $result = $this->db_model->update('users', $this->input->post('user_id'), $user_data);
            die($result);
        }else{
            die("Don't try to bypass system !");
        }
    }

    public function delete_user()
    {
        if ($this->input->post('id') && is_numeric($this->input->post('id'))){
            $result = $this->db_model->remove('users', array("id" => $this->input->post('id')));
            die($result);
        }else{
            die("Don't try to bypass system !");
        }
    }
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */