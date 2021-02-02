<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    // function __construct() {
    //     parent::__construct();
    //     if($this->session->userdata("status")=="login"){
    //         $this->check_login();
    //     }
    // }

    // public function check_login(){
    //     $id = $this->session->userdata("role");
    //     if($id==1){
    //         redirect(base_url('user'));
    //     }
    // }
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
	public function index(){
		$data['page'] = 'user';
        $res = $this->db->get('tb_user')->result();
        $data['user'] = $res;
        $this->load->view('admin/adm_head');
        $this->load->view('admin/adm_nav',$data);
        $this->load->view('admin/pg_user_adm',$data);
        $this->load->view('admin/adm_footer');
    }

    public function add(){
        $data['page'] = 'user';
        $this->load->view('admin/adm_head');
        $this->load->view('admin/adm_nav',$data);
        $this->load->view('admin/pg_user_add_adm',$data);
        $this->load->view('admin/adm_footer');
    }

    public function act_add(){
		$nama = $this->input->post('nama');
		$username = $this->input->post('username');
		$role = $this->input->post('role');
        
		if (($nama != 0) || ($nama != "")){
			$data = array(
				'nama' => $nama,
				'username' => $username,
				'pass' => md5("password1"),
				'role_id' => $role
			);
			
			if($this->db->insert('tb_user', $data)){
				redirect(base_url('user'));
			}
		}
    }
    
    public function delete()
	{
		$data['page'] = 'user';
		$where = array('id'=>$this->input->get('id'));
		
		if( $this->db->delete('tb_user', $where)){
			redirect(base_url('user'));
		}
	}
}
