<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
    }

	public function index()
	{
		$this->load->template('home');
	}

	public function get_filters_data($email, $exp_prog_id)
    {
		$this->load->model('common/exporter_mssql_to_mysql');
		$site_user_id = $this->exporter_mssql_to_mysql->get_user_id($email);

		// echo $site_user_id . '<br>';
		// echo $exp_prog_id . '<br>';
		
        $data = []; 
        // $data = mssql-ic vercrvac tvyalner@ voronq filterum vorpes arjeq petq a ogtagorcven
		$data['storages']  = $this->exporter_mssql_to_mysql->get_storages($site_user_id, $exp_prog_id);
		$data['mtgroups']  = $this->exporter_mssql_to_mysql->get_mtgroups($site_user_id, $exp_prog_id);
		$data['materials'] = $this->exporter_mssql_to_mysql->get_materials($site_user_id, $exp_prog_id);
		$data['partners']  = $this->exporter_mssql_to_mysql->get_partners($site_user_id, $exp_prog_id);
		// var_dump($data);die;
        return $data;
    }
	
	public function get_sales(){

		$this->load->model('common/exporter_mssql_to_mysql');
		
		$session = $this->session->userdata("user");	
		$site_user_id = $this->exporter_mssql_to_mysql->get_user_id($session['email']);

			
		$storages = array();
		$data = array();
		
		$start_date = 0;
		$end_date = 0;
        $storage = 0;
		$mtgroup = 0;
		$material = 0;
		$partner = 0;
		$sort = 0;
		
		if ($this->input->get('start_date')) 
		{
			$start_date = trim($this->input->get('start_date'));
		}
		
		if ($this->input->get('end_date')) 
		{
			$end_date = trim($this->input->get('end_date'));
		}
		
		if ($this->input->get('storage_id')) 
		{
			$storage = trim($this->input->get('storage_id'));
			$storages[] = $storage;
		}
		
		if ($this->input->get('mtgroup_id')) 
		{
			$mtgroup = trim($this->input->get('mtgroup_id'));
		}
		
		if ($this->input->get('material_id')) 
		{
			$material = trim($this->input->get('material_id'));
		}
		
		if ($this->input->get('partner_id')) 
		{
			$partner = trim($this->input->get('partner_id'));
		}
		
		if ($this->input->get('sort_by')) 
		{
			$sort = trim($this->input->get('sort_by'));
		}
			
		$sales = $this->exporter_mssql_to_mysql->get_sales($site_user_id, 2, $start_date, $end_date, $material, $mtgroup, $partner, $storages, $sort);


		//$('#table_wrapper').append('table border="1" cellspacing="0" bordercolor="#222" id="list"');
		//print_r($data['sales']);
		//;
		return $sales;
	}

	public function dramarkkhi_sharj()
	{
		$session = $this->session->userdata("user");
		if (empty($session) || empty($session['email']) || empty($session['id']) ) {
            redirect(base_url());
        }
        $result = $this->get_filters_data($session['email'], 2);   //1
		$result["dataT"] = [];
		if($this->input->get()){
			$result["dataT"] = $this->get_sales();			
			// echo "<pre>";
			// print_r($this->get_sales());die;
			return $this->load->template('cash_flow', $result);
		}	

		$this->load->template('cash_flow', $result);
	}

	public function nyutakan_arjeqner()
	{
		$session = $this->session->userdata("user");
		if (empty($session) || empty($session['email']) || empty($session['id']) ) {
            redirect(base_url());
        }

        $result = $this->get_filters_data($session['email'], 2);
		$this->load->template('material_values', $result);
	}

	public function login()
	{
		if ($this->input->post('email') && $this->input->post('password')) {
			$email = trim($this->input->post('email'));
			$password = trim($this->input->post('password'));
			$my_error = '';
			if (empty($email)) {
				$my_error['error']['email'] = "Էլ. հասցեն նշված չէ !" ;
			}else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $my_error['error']['email'] = "Դաշտի պարունակությունը չի հանդիսանում Էլ. հասցե !";
            }	
			if (empty($password)) {
				$my_error['error']['password']  = "Գաղտնաբառը նշված չէ !" ;
			}	
			if (!empty($my_error)) {
				die(json_encode($my_error));
			}
			
        	$this->load->model('admin/db_model');
			$this->load->model('common/exporter_mssql_to_mysql');  //vsbagdasarov
        	
        	$result = $this->db_model->getData('users', array('email' => mysql_real_escape_string( htmlspecialchars( $email ) ) ));
        	if (!empty($result) && sha1(md5($password)) == $result[0]['password'] ){
               	$user = array(
               		'user' => array(
               			'email' => $result[0]['email'], 
               			'id'   => $result[0]['id']
               			)
               		);
               	$this->session->set_userdata($user);

// vsbagdasarov -->
//				$mssql_connect = array();
//				$exp_prog_id = 2;
//				$site_user_id = $user['user']['id'];
//				$result = $this->exporter_mssql_to_mysql->import_data($mssql_connect, $site_user_id, $exp_prog_id);
//				echo $result;
// vsbagdasarov <-- 
                die('1');
            }

            $my_error['error']['user_error'] = "Մուտքագրված տվյալները սխալ են !";
            if (!empty($my_error)) {
				die(json_encode($my_error));
			}
		}
		die('0');
	}

	public function logout()
	{
		$this->session->sess_destroy("user");
		redirect(base_url());
	}


}

