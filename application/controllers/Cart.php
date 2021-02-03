<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller {

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
        $where = array(
            'username' => $this->session->userdata('username')
        );
        
        $res = $this->db->get_where('tb_user',$where)->result();

        $where = array(
            'user_id' => $res[0]->id
        );
        $data['cart'] = $this->db->get_where('tb_cart',$where)->result();
        $data['page'] = 'cart.index';

		$this->load->view('admin/adm_head');
		$this->load->view('admin/adm_nav',$data);
        $this->load->view('admin/pg_cart',$data);
		$this->load->view('admin/adm_footer');
    }

    public function add(){
        $where = array(
            'username' => $this->session->userdata('username')
        );
        $res = $this->db->get_where('tb_user',$where)->result();
        $where = array(
            'user_id' => $res[0]->id,
            'produk_id' => $this->input->get('id')
        );
        $rows = $this->db->get_where('tb_cart',$where)->num_rows();
        $resc = $this->db->get_where('tb_cart',$where)->result();

        if($rows > 0){
            redirect(base_url('cart/edit?id='.$resc[0]->id));
        } else {
            $data['page'] = 'admin.index';
            $where = array(
                'id' => $this->input->get('id')
            );
            $data['product'] = $this->db->get_where('tb_produk',$where)->result();
            $this->load->view('admin/adm_head');
            $this->load->view('admin/adm_nav',$data);
            $this->load->view('admin/pg_cart_add',$data);
            $this->load->view('admin/adm_footer',$data);
        }
    }

    public function act_add(){
        $idbarang = $this->input->post('idbarang');
        $jml = $this->input->post('jml');
        
        $where = array(
            'username' => $this->session->userdata('username')
        );
        
        $res = $this->db->get_where('tb_user',$where)->result();

		if (($jml != 0) || ($jml != "")){
			$data = array(
				'user_id' => $res[0]->id,
				'produk_id' => $idbarang,
				'satuan' => $jml
			);
			
			if($this->db->insert('tb_cart', $data)){
				redirect(base_url('admin'));
			}
		}
    }

    public function edit(){
            $data['page'] = 'cart.index';
            $where = array(
                'id' => $this->input->get('id')
            );
            $res = $this->db->get_where('tb_cart',$where)->result();

            $data['cart'] = $res;
            $data['product'] = $this->db->get_where('tb_produk',array('id'=>$res[0]->produk_id))->result();;
            $this->load->view('admin/adm_head');
            $this->load->view('admin/adm_nav',$data);
            $this->load->view('admin/pg_cart_edit',$data);
            $this->load->view('admin/adm_footer',$data);
    }

    public function act_edit(){
        $idbarang = $this->input->post('idbarang');
        $jml = $this->input->post('jml');
        $id = $this->input->post('id');
        
        $where = array(
            'username' => $this->session->userdata('username')
        );
        
        $res = $this->db->get_where('tb_user',$where)->result();

		if (($jml != 0) || ($jml != "")){
			$data = array(
				'user_id' => $res[0]->id,
				'produk_id' => $idbarang,
				'satuan' => $jml
            );
            $where = array(
                'id' => $id
            );
			$this->db->where($where);
			if($this->db->update('tb_cart', $data)){
                if($this->input->post('s')=='c'){
                    redirect(base_url('cart'));
                } else {
                    redirect(base_url('admin'));
                }
			}
		}
    }

    public function act_invoice()
    {
        $where = array(
            'username' => $this->session->userdata('username')
        );
        $res = $this->db->get_where('tb_user',$where)->result();
        $where = array(
            'user_id' => $res[0]->id
        );
        $rescart = $this->db->get_where('tb_cart',$where)->result();

        $invdata = array(
            'user_id'=> $res[0]->id,
            'status_bayar'=> 0
        );
        $this->db->insert('tb_invoice', $invdata);
        $insert_id = $this->db->insert_id();
        
        foreach($rescart as $data){
            $invdetail = array(
                'invoice_id'=> $insert_id,
                'produk_id'=> $data->produk_id,
                'satuan'=> $data->satuan
            );
            $this->db->insert('tb_d_invoice', $invdetail);

            // update stok

        }

        if($this->db->delete('tb_cart', array('user_id' => $res[0]->id))){
            redirect(base_url('cart/invoice'));
        }
        // print_r($rescart);
    }

    public function invoice(){
        $data['page'] = 'invoice';
        $where = array(
            'username' => $this->session->userdata('username')
        );
        $res = $this->db->get_where('tb_user',$where)->result();
        $where = array(
            'user_id' => $res[0]->id
        );
        $res = $this->db->get_where('tb_invoice',$where)->result();

        // print_r($res);
        // die;
        $data['invoice'] = $res;
        // $data['product'] = $this->db->get_where('tb_produk',array('id'=>$res[0]->produk_id))->result();;
        $this->load->view('admin/adm_head');
        $this->load->view('admin/adm_nav',$data);
        $this->load->view('admin/pg_invoice',$data);
        $this->load->view('admin/adm_footer');
    }

    public function adm_invoice(){
        $data['page'] = 'invoice';
        $res = $this->db->get('tb_invoice')->result();

        // print_r($res);
        // die;
        $data['invoice'] = $res;
        // $data['product'] = $this->db->get_where('tb_produk',array('id'=>$res[0]->produk_id))->result();;
        $this->load->view('admin/adm_head');
        $this->load->view('admin/adm_nav',$data);
        $this->load->view('admin/pg_invoice_adm',$data);
        $this->load->view('admin/adm_footer');
    }

    public function inv_detail(){
        $data['page'] = 'invoice';
        $where = array(
            'id' => $this->input->get('id')
        );
        $res = $this->db->get_where('tb_invoice',$where)->result();
        $where = array(
            'invoice_id' => $this->input->get('id')
        );
        $res_detail = $this->db->get_where('tb_d_invoice',$where)->result();

        // print_r($res);
        // die;
        $data['invoice'] = $res;
        $data['invoice_detail'] = $res_detail;
        // $data['product'] = $this->db->get_where('tb_produk',array('id'=>$res[0]->produk_id))->result();;
        $this->load->view('admin/adm_head');
        $this->load->view('admin/adm_nav',$data);
        $this->load->view('admin/pg_invoice_detail',$data);
        $this->load->view('admin/adm_footer');
    }

    public function inv_print(){
        $data['page'] = 'invoice';
        $where = array(
            'id' => $this->input->get('id')
        );
        $res = $this->db->get_where('tb_invoice',$where)->result();
        $where = array(
            'invoice_id' => $this->input->get('id')
        );
        $res_detail = $this->db->get_where('tb_d_invoice',$where)->result();
        $data['invoice'] = $res;
        $data['invoice_detail'] = $res_detail;
        $this->load->view('admin/invoice_print',$data);
    }

    public function cetak_resi(){
        $data['page'] = 'invoice';
        $where = array(
            'id' => $this->input->get('id')
        );
        $res = $this->db->get_where('tb_invoice',$where)->result();
        $where = array(
            'invoice_id' => $this->input->get('id')
        );
        $res_detail = $this->db->get_where('tb_d_invoice',$where)->result();
        $data['invoice'] = $res;
        $data['invoice_detail'] = $res_detail;
        $this->load->view('admin/invoice_print',$data);
    }

    public function upload_bukti(){
        $data['page'] = 'invoice';
        $where = array(
            'id' => $this->input->get('id')
        );
        $res = $this->db->get_where('tb_invoice',$where)->result();
        $where = array(
            'invoice_id' => $this->input->get('id')
        );
        $res_detail = $this->db->get_where('tb_d_invoice',$where)->result();

        // print_r($res);
        // die;
        $data['invoice'] = $res;
        $data['invoice_detail'] = $res_detail;
        // $data['product'] = $this->db->get_where('tb_produk',array('id'=>$res[0]->produk_id))->result();;
        $this->load->view('admin/adm_head');
        $this->load->view('admin/adm_nav',$data);
        $this->load->view('admin/pg_upload',$data);
        $this->load->view('admin/adm_footer');
    }

    public function act_valid_adm(){
        $where = array(
            'id' => $this->input->get('id')
        );

        $data = array(
            'status_bayar' => $this->input->get('s')
        );

        $this->db->where($where);
        if($this->db->update('tb_invoice', $data)){
            if($this->input->get('u')=='adm'){
                redirect(base_url('cart/adm_invoice'));
            } else {
                redirect(base_url('cart/invoice'));
            }
        }
    }

    public function act_upload(){

        $config['upload_path']          = './uploads/product/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['file_name']            = 'bukti'.$this->input->post('id');
        $config['overwrite']			= true;
        $config['max_size']             = 1024; // 1MB
        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        $uploaded = null;
        if ($this->upload->do_upload('fileku')) {
            $uploaded = $this->upload->data("file_name");  
        } else {
            $uploaded = "default.jpg";
        }

        if (!$this->upload->do_upload('fileku')) {
            $error = $this->upload->display_errors();
            // menampilkan pesan error
            print_r($error);
        }

        $where = array(
            'id' => $this->input->post('id')
        );

        $data = array(
            'bukti' => $uploaded
        );

        $this->db->where($where);
        if($this->db->update('tb_invoice', $data)){
            redirect(base_url('cart/invoice'));
        }
    }

    public function clear_cart(){
        $data['page'] = 'cart.index';
        $res = $this->db->get_where('tb_user',array('username'=>$this->session->userdata('username')))->result();

		$where = array('user_id'=>$res[0]->id);
		
		if( $this->db->delete('tb_cart', $where)){
			redirect(base_url('cart'));
		}
    }
}
