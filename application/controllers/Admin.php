<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    function __construct() {
		parent::__construct();
		if(!$this->session->has_userdata("status")){
			redirect(base_url());
		}
    }

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
        $data['page'] = 'admin.index';
		$data['produk'] = $this->db->get('tb_produk')->result();

		$this->load->view('admin/adm_head');
		$this->load->view('admin/adm_nav',$data);
        $this->load->view('admin/pg_admin',$data);
		$this->load->view('admin/adm_footer');
    }
    
    public function act_logout(){
        $this->session->sess_destroy();
	    redirect(base_url('welcome'));
    }
}
