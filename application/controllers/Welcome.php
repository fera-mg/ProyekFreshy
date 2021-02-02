<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct() {
        parent::__construct();
        if($this->session->userdata("status")=="login"){
            redirect(base_url('admin'));
        }
    }
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('v_beranda');
	}
	public function login()
	{
		// $this->load->helper('form');
		$this->load->view('v_login');
	}

	public function daftar()
	{
		// $this->load->helper('form');
		$this->load->view('v_daftar');
	}

	public function act_daftar(){
		$nama = $this->input->post('name');
		$usrnm = $this->input->post('usernm');
		$pswd =  $this->input->post('passwd');
		$rpswd =  $this->input->post('rpasswd');

		if ($rpswd == $pswd){
			$data = array(
				'role_id' => 1,
				'nama' => $nama,
				'username' => $usrnm,
				'pass' => md5($pswd)
			);
			
			if($this->db->insert('tb_user', $data)){
				$this->load->view('v_sukses');
			}
		} else {
			$this->session->message = "Password tidak sama";
		}
	}

	public function act_login(){
		$usrnm = $this->input->post('usernm');
		$pswd =  $this->input->post('passwd');

		$where = array (
			'username' => $usrnm,
			'pass' => md5($pswd)
		);

		// $this->db->select('*');
		// $this->db->from('tb_user');
		// $this->db->where('username',);
		// $data = $this->db->get()->result();

		// echo md5("password1");
		$rows = $this->db->get_where('tb_user',$where)->num_rows();

		if ($rows > 0){

			$data_session = null;
			$res = $this->db->get_where('tb_user',$where)->result();
			foreach ($res as $row)
			{
				$data_session = array(
					'username' => $row->username,
					'role' => $row->role_id,
					'nama' => $row->nama,
					'status' => "login"
				);
			}

			// print_r($data_session);
			$this->session->set_userdata($data_session);
			$this->session->firstlogin = 1;
			redirect(base_url("admin"));
		} else {
			redirect(base_url("welcome/login"));
		}
		// foreach($data as $key => $val){
		    
		// }
	   
		// print_r($data);
	}
}
