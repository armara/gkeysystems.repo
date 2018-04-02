<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Texts extends CI_Controller {

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
        $result['texts'] = $this->db_model->get('texts');
		$this->load->templateAdmin('texts',$result);
	}

	public function add_new_text()
    {
        if ($this->input->post()){
        	
            if ($this->input->post('text_alias') && $this->input->post('text_eng') && $this->input->post('text_arm') ){
				$text_alias = trim($this->input->post('text_alias'));
            	$text_eng 	= trim($this->input->post('text_eng'));
				$text_arm 	= trim($this->input->post('text_arm'));
            
				$my_error = '';
				if (empty($text_alias) ) {
					$my_error['error']['text_alias'] = "Alias is required";
				}
				if (empty($text_eng) ) {
					$my_error['error']['text_eng'] = "Text (Eng) is required";
				}
				if (empty($text_arm) ) {
					$my_error['error']['text_arm'] = "Text (Arm) is required";
				}
				if (!empty($my_error)) {
					die(json_encode($my_error));
				}
				$new_text_data = array(
                    'alias' 	=> mysql_real_escape_string( htmlspecialchars( $text_alias ) ),
                    'text_eng' 	=> mysql_real_escape_string( htmlspecialchars( $text_eng ) ),
                    'text_arm'  => mysql_real_escape_string( htmlspecialchars( $text_arm ) ),
                );
                $result = $this->db_model->insert('texts', $new_text_data);
                die($result);
            }
        }
        die("Don't try to bypass system !");
    }

	public function edit_text_data()
	{
		if ($this->input->post('text_id') && $this->input->post('text_eng') && $this->input->post('text_arm') ) {
			$my_error = '';
			$text_eng = trim($this->input->post('text_eng'));
			$text_arm = trim($this->input->post('text_arm'));
			if (empty($text_eng) ) {
				$my_error['error']['text_eng'] = "Text (Eng) is required";
			}
			if (empty($text_arm) ) {
				$my_error['error']['text_arm'] = "Text (Arm) is required";
			}
			if (!empty($my_error)) {
				die(json_encode($my_error));
			}
			$text_data = array(
					"text_eng" => mysql_real_escape_string( htmlspecialchars( $text_eng )),
					"text_arm" => mysql_real_escape_string( htmlspecialchars( $text_arm )),
				);
			$result = $this->db_model->update('texts', mysql_real_escape_string($this->input->post('text_id')), $text_data);
            die($result);
		}
        die("Don't try to bypass system !");
    }


    public function delete_text()
    {
        if ($this->input->post('id') ){
            $result = $this->db_model->remove('texts', array("id" => mysql_real_escape_string($this->input->post('id')) ));
            die($result);
        }
        die("Don't try to bypass system !");
    }
	
}

