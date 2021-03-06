<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    function __construct() {
		parent::__construct();
		$this->check_expired();
		if(!$this->session->has_userdata("status")){
			redirect(base_url());
		}
    }

	private function check_expired(){
        // cek jatuh tempo
        $resInvoice = $this->db->get('tb_invoice')->result();
        foreach ($resInvoice as $data){
            $date2 = strtotime($data->tanggal. ' + 2 days');
            $date_diff=($date2-strtotime(date("Y-m-d"))) / 86400;
            if($date_diff < 0 && $data->bukti == null){
                $res = $this->db->get_where('tb_d_invoice',array('invoice_id'=>$data->id))->result();
                foreach ($res as $value){
                    $this->tambahStock($value->produk_id,$value->satuan);
                }
                $this->db->delete('tb_d_invoice',array('invoice_id'=>$data->id));
            }
        }
	}
	
	private function tambahStock($id, $jml){
        $res = $this->db->get_where('tb_produk',array('id' => $id))->result();
        $data = array(
            'stok' => $res[0]->stok+$jml
        );
        $where = array(
            'id' => $id
        );
        $this->db->where($where);
        return $this->db->update('tb_produk', $data);
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
