<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Post extends CI_Controller {

/*
isi :
1. Post. operasi CRUD
vars:
postid
psbuat
psubah
tagid
psjudul
psustadz
pstext
mediaid
*/

	public function __construct($postid = null){
		parent::__construct();
		if ($this->session->userdata('username') and $this->session->userdata('userpass')){
		}else{
			redirect(base_url(''));
		}
		//load model
		$this->load->model('mpost');
		$this->load->model('mprofilm');
		$this->load->model('mprofiladmin');
		$this->load->model('mpengaturan');
	}

	//view all post

	public function index(){
		//$data['mode'] = 'post';
		$data['padmin']=$this->mprofiladmin->tampilpadmin()->row();
		$data['page'] = "Post";
		$data['ctrl'] = "post";
		$jumlah_data = $this->mpost->jumlah_data();

		$this->load->library('pagination');
		$config['base_url'] = base_url().'post/index/';
		$config['total_rows'] = $jumlah_data;
		$config['per_page'] = 5;
		$from = $this->uri->segment(3);
		$this->pagination->initialize($config);

		//$data['user'] = $this->m_data->data($config['per_page'],$from);
		$data['cmpost'] = $this->mpost->tampilpaging($config['per_page'],$from)->result();
		$str_links=$this->pagination->create_links();
		$data["links"] = explode('.',$str_links );

		$this->load->view('core/core',$data);
		$this->load->view('vpost',$data);
		$this->load->view('core/footer',$data);
	}

	//search
	function search(){
		$data['cmpost'] = $this->mpost->get_search();
		$data['padmin']=$this->mprofiladmin->tampilpadmin()->row();
		$data['page'] = "Post";
		$data['page2'] = "balik";// untuk tombol kembali
		// $data['mode'] = '';
		$data['cmprofil'] = $this->mprofilm->tampilprofilm()->row();
		$this->load->view('core/core',$data);
		$this->load->view('vpost',$data);
		$this->load->view('core/footer',$data);
	}

	// public function view($postid=null){ deprecated
	// view post untuk pratinjau admin!

	public function view($slug=null){
		$data['cmprofil'] = $this->mprofilm->tampilprofilm()->row();
		// $data['mode'] = "pengunjung";
		//jika postid null maka muncul daftar post
		$data['cmpost'] = $this->mpost->tampilpost()->result();
		if (!isset($slug)) {
			// $postid = 1;
			// $data['mode'] = 'viewall';
			$data['padmin']=$this->mprofiladmin->tampilpadmin()->row();
			$data['page'] = "Semua Post";
		}else {
			$data['mode'] = 'view';
			$data['slug'] = $slug;
			$data['post'] = $this->mpost->tampilpost($data)->row();
			$data['page'] = $data['post']->psjudul;

			$this->add_count($data['post']->postid);
		}
		$data['ctrl'] = "post";
		$data['pgt']=$this->mpengaturan->tampilpengaturan()->row();//4 footer
		$this->load->view('core/core',$data);
		$this->load->view('vpost',$data);
		$this->load->view('core/footer',$data);
		unset($data, $slug);
	}

	//view counter
	public function add_count($postid){
		$this->load->helper('cookie');
		$data['visitor']=$this->input->cookie($postid, FALSE);
		$data['ip'] = $this->input->ip_address();
		$data['expire']=60*60*24;
		if ($data['visitor'] == false) {
	      $cookie = array(
	        "name"   => $postid,
	        "value"  => $data['ip'],
	        "expire" => $data['expire'],
	        "secure" => false
	      );
	      $this->input->set_cookie($cookie);
	      $this->mpost->update_counter($postid);
	  	}
		unset($data, $postid, $cookie);
	}


/*

method-method untuk operasi admin

*/
	public function tulis(){
		$data['padmin']=$this->mprofiladmin->tampilpadmin()->row();
		$data['cmtag'] = $this->mpost->tampiltag()->result();
		$data['page'] = "Tulis Postingan";
		$data['error']=$this->session->userdata('err')?$this->session->userdata('err'):'';
		$data['input']=$this->session->userdata('input')?$this->session->userdata('input'):
			array(
				'psjudul' => '',
				'psustadz' => '',
				'pstext' => '',
				'pspublic' => '',
				'tagid' => ''
			);
		$data['ctrl'] = "post";

		$this->load->view('core/core',$data);
		$this->load->view('vpost',$data);
		$this->load->view('core/footer',$data);

		//bersih session
		$this->session->set_userdata('err',null);
		$this->session->set_userdata('input',null);
	}

	public function dbtulis(){
		$this->form_validation->set_rules('judul','Judul','required|min_length[3]|max_length[100]',
			array(
				'required' => '%s harus diisi',
				'min_length' => '%s harus >=3 karakter',
				'max_length' => '%s harus <=50 karakter'
			)
		);
		$this->form_validation->set_rules('text','Teks','required|min_length[8]|max_length[50000]',
			array(
				'required' => '%s harus diisi',
				'min_length' => '%s harus >=8 karakter',
				'max_length' => '%s harus <=50000 karakter'
			)
		);

		$data['psjudul'] = $this->input->post('judul');
		$data['psustadz'] = $this->input->post('ustadz');
		$data['pstext'] = $this->input->post('text');
		$data['tagid'] = $this->input->post('tagid');
		$data['pspublic']=$this->input->post('pspublic')?1:0;

		if (!$this->form_validation->run()) {
			$this->session->set_userdata('err',validation_errors());
			$this->session->set_userdata('input',$data);
			redirect('post/tulis');
		}

		$this->mpost->buatpost($data);
		redirect(base_url('post'));
		unset($data);
	}

	public function dbubah(){
		$this->form_validation->set_rules('judul','Judul','required|min_length[3]|max_length[100]',
			array(
				'required' => '%s harus diisi',
				'min_length' => '%s harus >=3 karakter',
				'max_length' => '%s harus <=50 karakter'
			)
		);
		$this->form_validation->set_rules('text','Teks','required|min_length[8]|max_length[50000]',
			array(
				'required' => '%s harus diisi',
				'min_length' => '%s harus >=8 karakter',
				'max_length' => '%s harus <=50000 karakter'
			)
		);

		$data['postid'] = $this->input->post('postid');
		$data['psjudul'] = $this->input->post('judul');
		$data['psustadz'] = $this->input->post('ustadz');
		$data['pstext'] = $this->input->post('text');
		$data['tagid'] = $this->input->post('tagid')?$this->input->post('tagid'):1;
		//jika diset maka 1, jika tidak sebaliknya
		$data['pspublic']=$this->input->post('pspublic')?1:0;

		$this->mpost->ubahpost($data);
		redirect(base_url('post'));
		unset($data);
	}

	public function dbhapus($postid){
		$data['postid'] = $postid;
		$this->mpost->hapuspost($data);

		redirect(base_url('post'));
		unset($data,$postid);
	}

	public function dbpublish($postid){
		$data['postid'] = $postid;
		$this->mpost->publishpost($data);

		redirect(base_url('post'));
		unset($data,$postid);
	}

	// public function ubahpost($postid){ old id
	public function ubahpost($slug){
		$data['padmin']=$this->mprofiladmin->tampilpadmin()->row();
		$data['page'] = "Ubah Postingan";
		$data['ctrl'] = "post";
		// $data['postid'] = $postid;
		$data['slug'] = $slug;
		$data['cmtag'] = $this->mpost->tampiltag()->result();
		$data['post'] = $this->mpost->tampilpost($data)->row();
		$data['error']=$this->session->userdata('err')?$this->session->userdata('err'):'';
		$data['input']=$this->session->userdata('input')?$this->session->userdata('input'):
			array(
				'psjudul' => '',
				'psustadz' => '',
				'pstext' => '',
				'tagid' => ''
			);

		$this->load->view('core/core',$data);
		$this->load->view('vpost',$data);
		$this->load->view('core/footer',$data);
		$this->session->set_userdata('err',null);
		$this->session->set_userdata('input',null);
	}

	public function hapuspost(){
		$data['padmin']=$this->mprofiladmin->tampilpadmin()->row();
		$data['page'] = "Hapus Postingan";
		// $data['tanya'] = "<script>alert('yakin hapus ?')</script>";
		// $this->mpost->

		$this->load->view('core/core',$data);
		$this->load->view('vpost',$data);
		redirect(base_url('post'));
	}

}
