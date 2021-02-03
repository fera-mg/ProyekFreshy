<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

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
	public function index()
	{
		$data['page'] = 'barang';
        $res = $this->db->get('tb_produk')->result();

        // print_r($res);
        // die;
        $data['produk'] = $res;
        // $data['product'] = $this->db->get_where('tb_produk',array('id'=>$res[0]->produk_id))->result();;
        $this->load->view('admin/adm_head');
        $this->load->view('admin/adm_nav',$data);
        $this->load->view('admin/pg_product_adm',$data);
        $this->load->view('admin/adm_footer');
	}

	public function add()
	{
		$data['page'] = 'barang';
        // $res = $this->db->get('tb_produk')->result();

        // print_r($res);
        // die;
        // $data['produk'] = $res;
        // $data['product'] = $this->db->get_where('tb_produk',array('id'=>$res[0]->produk_id))->result();;
        $this->load->view('admin/adm_head');
        $this->load->view('admin/adm_nav',$data);
        $this->load->view('admin/pg_product_add_adm',$data);
        $this->load->view('admin/adm_footer');
	}
	
	public function act_add(){
		$nama = $this->input->post('nama');
		$kategori = $this->input->post('kategori');
		$harga = $this->input->post('harga');
        
		if (($nama != 0) || ($nama != "")){
			$data = array(
				'nama_produk' => $nama,
				'kategori_id' => $kategori,
				'harga' => $harga
			);
			
			if($this->db->insert('tb_produk', $data)){
				$insert_id = $this->db->insert_id();

				$config['upload_path']          = './uploads/product/';
				$config['allowed_types']        = 'gif|jpg|png';
				$config['file_name']            = 'produk'.$insert_id;
				$config['overwrite']			= true;
				$config['max_size']             = 1024; // 1MB
				$this->load->library('upload', $config);
				$this->upload->initialize($config);

				$uploaded = null;
				if ($this->upload->do_upload('img')) {
					$uploaded = $this->upload->data("file_name");  
				} else {
					$uploaded = "default.jpg";
				}

				if (!$this->upload->do_upload('img')) {
					$error = $this->upload->display_errors();
					// menampilkan pesan error
					print_r($error);
				}
				// die;

				$where = array(
					'id' => $insert_id
				);

				$data = array(
					'gambar' => $uploaded
				);

				$this->db->where($where);
				if($this->db->update('tb_produk', $data)){
					redirect(base_url('product'));
				}
			}
		}
	}

	public function edit()
	{
		$data['page'] = 'barang';

        $res = $this->db->get_where('tb_produk',array('id'=>$this->input->get('id')))->result();

        // print_r($res);
        // die;
        $data['produk'] = $res;
        // $data['product'] = $this->db->get_where('tb_produk',array('id'=>$res[0]->produk_id))->result();;
        $this->load->view('admin/adm_head');
        $this->load->view('admin/adm_nav',$data);
        $this->load->view('admin/pg_product_edit_adm',$data);
        $this->load->view('admin/adm_footer');
	}

	public function act_edit(){
		$id =  $this->input->post('id');
		$nama = $this->input->post('nama');
		$kategori = $this->input->post('kategori');
		$harga = $this->input->post('harga');
        
		if (($nama != 0) || ($nama != "")){
			$data = array(
				'nama_produk' => $nama,
				'kategori_id' => $kategori,
				'harga' => $harga
			);
			$where = array('id' => $id);
			$this->db->where($where);
			if($this->db->update('tb_produk', $data)){
				$insert_id = $id;

				$config['upload_path']          = './uploads/product/';
				$config['allowed_types']        = 'gif|jpg|png';
				$config['file_name']            = 'produk'.$insert_id;
				$config['overwrite']			= true;
				$config['max_size']             = 1024; // 1MB
				$this->load->library('upload', $config);
				$this->upload->initialize($config);

				$uploaded = null;
				if ($this->upload->do_upload('img')) {
					$uploaded = $this->upload->data("file_name");  
				} else {
					$uploaded = $this->input->post('old_img');
				}

				if (!$this->upload->do_upload('img')) {
					$error = $this->upload->display_errors();
					// menampilkan pesan error
					print_r($error);
				}
				// die;

				$where = array(
					'id' => $insert_id
				);

				$data = array(
					'gambar' => $uploaded
				);

				$this->db->where($where);
				if($this->db->update('tb_produk', $data)){
					redirect(base_url('product'));
				}
			}
		}
	}

	public function delete()
	{
		$data['page'] = 'barang';
		$where = array('id'=>$this->input->get('id'));
		
		
		$res = $this->db->get_where('tb_produk',array('id'=>$this->input->get('id')))->result();
		if($res[0]->gambar != "" || $res[0]->gambar != "default.jpg"){
			$filename = explode(".",  $res[0]->gambar)[0];
			array_map('unlink', glob(FCPATH."uploads/product/$filename.*"));
		}
		
		if( $this->db->delete('tb_produk', $where)){
			redirect(base_url('product'));
		}
	}
}
