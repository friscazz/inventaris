<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inventaris extends CI_Controller {

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
	public function __construct(){
		parent:: __construct();
		$this->load->model('inventaris_m');
	}
	
	public function dashboard()
	{	
		$this->load->view('templates/header');
		$this->load->view('inventaris/dashboard');
		$this->load->view('templates/footer');
	}
	public function data()
	{
		$data['data'] = $this->inventaris_m->tampilData();
		$this->load->view('templates/header');
		$this->load->view('inventaris/data', $data);
		$this->load->view('templates/footer');
	}
	public function tambahdata(){
		$con = array(
			array(
				'field' => 'barang',
				'label' => 'Barang',
				'rules' => 'required',
				'errors' => array(
					'required' => 'Harus Mengisi %s.',
				),
			),
			array(
				'field' => 'nama',
				'label' => 'Nama',
				'rules' => 'required',
				'errors' => array(
					'required' => 'Harus Mengisi %s.',
				),
			),
			array(
				'field' => 'jenis',
				'label' => 'Jenis',
				'rules' => 'required',
				'errors' => array(
					'required' => 'Harus Mengisi %s.',
				),
			),
			array(
				'field' => 'kategori',
				'label' => 'Kategori',
				'rules' => 'required',
				'errors' => array(
					'required' => 'Harus Mengisi %s.',
				),
			),
			
			array(
				'field' => 'pembelian',
				'label' => 'Pembelian',
				'rules' => 'required',
				'errors' => array(
					'required' => 'Harus Mengisi %s.',
				),
			),
			array(
				'field' => 'harga',
				'label' => 'Harga',
				'rules' => 'required',
				'errors' => array(
					'required' => 'Harus Mengisi %s.',
				),
			),
			array(
				'field' => 'kondisi',
				'label' => 'Kondisi',
				'rules' => 'required',
				'errors' => array(
					'required' => 'Harus Mengisi %s.',
				),
			),
		);
		$this->form_validation->set_rules($con);
		$data['jenis'] = $this->inventaris_m->tampilJenis();
		$data['kategori'] = $this->inventaris_m->tampilKategori();
		$data['kondisi'] = $this->inventaris_m->tampilKondisi();
		$data['divisi'] = $this->inventaris_m->tampilDivisi();
		$data['lokasi'] = $this->inventaris_m->tampilLokasi();
			if($this->form_validation->run() == FALSE){
				$this->load->view('templates/header');
				$this->load->view('inventaris/tambahdata',$data);
				$this->load->view('templates/footer');	
			}else {
				$this->adddata();
			}
		}
	public function ubahdata($id)
	{
		$con = array(
			array(
				'field' => 'barang',
				'label' => 'Barang',
				'rules' => 'required',
				'errors' => array(
					'required' => 'Harus Mengisi %s.',
				),
			),
			array(
				'field' => 'nama',
				'label' => 'Nama',
				'rules' => 'required',
				'errors' => array(
					'required' => 'Harus Mengisi %s.',
				),
			),
			array(
				'field' => 'jenis',
				'label' => 'Jenis',
				'rules' => 'required',
				'errors' => array(
					'required' => 'Harus Mengisi %s.',
				),
			),
			array(
				'field' => 'kategori',
				'label' => 'Kategori',
				'rules' => 'required',
				'errors' => array(
					'required' => 'Harus Mengisi %s.',
				),
			),
			
			array(
				'field' => 'pembelian',
				'label' => 'Pembelian',
				'rules' => 'required',
				'errors' => array(
					'required' => 'Harus Mengisi %s.',
				),
			),
			array(
				'field' => 'harga',
				'label' => 'Harga',
				'rules' => 'required',
				'errors' => array(
					'required' => 'Harus Mengisi %s.',
				),
			),
			array(
				'field' => 'kondisi',
				'label' => 'Kondisi',
				'rules' => 'required',
				'errors' => array(
					'required' => 'Harus Mengisi %s.',
				),
			),
		);
		$this->form_validation->set_rules($con);
		$data['jenis'] = $this->inventaris_m->tampilJenis();
		$data['kategori'] = $this->inventaris_m->tampilKategori();
		$data['kondisi'] = $this->inventaris_m->tampilKondisi();
		$data['inventaris'] = $this->inventaris_m->Dataedit($id);
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/header');
			$this->load->view('inventaris/editdata', $data);
			$this->load->view('templates/footer');
		} else {
			$this->editdata($id);
		}
	}
	public function editdata($id){
		$barang = $this->input->post('barang', true);
		$nama = $this->input->post('nama', true);
		$img = $this->input->post('image', true);
		$config['upload_path']          = './uploads/';
		$config['allowed_types']        = 'jpeg|jpg|png';
		$config['file_name']		  = $barang;
		$config['max_size']             = 2048;
		$this->load->library('upload', $config);
		if ($_FILES['image']['name'] != null) {
			if ($this->upload->do_upload('image')) {
				$img['image'] = $this->upload->data('file_name');
				$this->inventaris_m->editData($img, $barang, $nama, $id);
				$this->session->set_flashdata("flash", '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                                                            Data Berhasil Diubah
                                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                            </button>
												</div>');
				redirect("inventaris/data");
			} else {
				$error = $this->upload->display_errors();
				$this->session->set_flashdata('error', '<div class="alert alert-danger alert-dismissible fade show" role="alert">'
					. $error .
					'<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                            </button>
												</div>');
				redirect('inventaris/ubahdata');
			}
		}else{
			$this->inventaris_m->editData($img, $barang, $nama, $id);
			$this->session->set_flashdata("flash", '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                                                            Data Berhasil Diubah
                                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                            </button>
												</div>');
			redirect("inventaris/data");
		}
	}
	public function adddata(){
		$table = "inventaris";
		$field = "kode";
		$last = $this->inventaris_m->getMax($table, $field);
		$noUrut = (int) substr($last, -8,8);
		$noUrut++;
		$str="INVEN";
		$new = $str.sprintf('%04s',$noUrut);
		$harga = $this->input->post('harga', true);
		$harga_awal = preg_replace("/[^0-9]/", "", $harga);
		$harga_int = (int) $harga_awal;
		$tanggal = date('m-d-Y', strtotime($this->input->post('pembelian', true)));
		$barang = $this->input->post('barang', true);
		$nama = $this->input->post('nama', true);
		$img = $this->input->post('image', true);
		$kode = $new;

		$this->load->library('ciqrcode'); //pemanggilan library QR CODE
		$conf['cacheable']    = true; //boolean, the default is true
		$conf['cachedir']     = './asset/'; //string, the default is application/cache/
		$conf['errorlog']     = './asset/'; //string, the default is application/logs/
		$conf['imagedir']     = './uploads/'; //direktori penyimpanan qr code
		$conf['quality']      = true; //boolean, the default is true
		$conf['size']         = '1024'; //interger, the default is 1024
		$conf['black']        = array(224, 255, 255); // array, default is array(255,255,255)
		$conf['white']        = array(70, 130, 180); // array, default is array(0,0,0)
		$this->ciqrcode->initialize($conf);

		$image_name = $kode . '.png'; //buat name dari qr code sesuai dengan nim

		$params['data'] =  $kode.'<br>'.$barang.'<br>'.$nama.'<br>'.$harga.'<br>'.$tanggal;
		//data yang akan di jadikan QR CODE
		$params['level'] = 'H';
		//H=High
		$params['size'] = 10;
		$params['savename'] = FCPATH . $conf['imagedir'] . $image_name; //simpan image QR CODE ke folder assets/images/
		$this->ciqrcode->generate($params); // fungsi untuk generate QR CODE



		$config['upload_path']          = './uploads/';
		$config['allowed_types']        = 'jpeg|jpg|png';
		$config['file_name']		  = $barang;
		$config['max_size']             = 2048;
	$this->load->library('upload', $config);
	if ($this->upload->do_upload('image')) {	
		$img['image'] = $this->upload->data('file_name');
		$this->inventaris_m->AddData($img,$kode,$barang,$nama,$image_name, $tanggal, $harga_int);
		$this->session->set_flashdata("flash", '<div class="alert alert-success alert-dismissible fade show" role="alert">
													Data Berhasil Ditambahkan
													<button type="button" class="close" data-dismiss="alert" aria-label="Close">
													<span aria-hidden="true">&times;</span>
													</button>
													</div>');
		redirect("inventaris/data");
	}else{
		$error = $this->upload->display_errors();
		$this->session->set_flashdata('error', '<div class="alert alert-danger alert-dismissible fade show" role="alert">'
                                                            .$error.
                                                            '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                            </button>
												</div>');
		redirect('inventaris/tambahdata');
	}
}
	public function kategori()
	{
			$data['kategori'] = $this->inventaris_m->tampilKategori();
			$this->load->view('templates/header');
			$this->load->view('inventaris/kategori', $data);
			$this->load->view('templates/footer');
		

	}
	public function ubahKategori($id){
		$this->inventaris_m->UpdateKategori($id);
		$this->session->set_flashdata("flash", '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                                                            Data Berhasil Diubah
                                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                            </button>
												</div>');
		redirect("inventaris/kategori");
	}
	public function hapusKategori($id)
	{
		$this->inventaris_m->DeleteKategori($id);
		$this->session->set_flashdata("flash", '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                            Data Berhasil Dihapus
                                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                            </button>
												</div>');
		redirect("inventaris/kategori");
	}
	public function tambahKategori(){
			$this->inventaris_m->AddKategori();
			$this->session->set_flashdata("flash", '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                                            Data Berhasil Ditambahkan
                                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                            </button>
                                                            </div>');
			redirect("inventaris/kategori");
	}
	public function jenis()
	{
		$data['jenis'] = $this->inventaris_m->tampilJenis();
		$this->load->view('templates/header');
		$this->load->view('inventaris/jenis',$data);
		$this->load->view('templates/footer');
	}
	public function ubahJenis($id)
	{
		$this->inventaris_m->UpdateJenis($id);
		$this->session->set_flashdata("flash", '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                                                            Data Berhasil Diubah
                                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                            </button>
												</div>');
		redirect("inventaris/divisi");
	}
	public function hapusJenis($id)
	{
		$this->inventaris_m->DeleteJenis($id);
		$this->session->set_flashdata("flash", '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                            Data Berhasil Dihapus
                                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                            </button>
												</div>');
		redirect("inventaris/jenis");
	}
	public function tambahJenis()
	{
		$this->inventaris_m->AddJenis();
		$this->session->set_flashdata("flash", '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                                            Data Berhasil Ditambahkan
                                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                            </button>
                                                            </div>');
		redirect("inventaris/jenis");
	}
	
	public function kondisi()
	{
		$data['kondisi'] = $this->inventaris_m->tampilKondisi();
		$this->load->view('templates/header');
		$this->load->view('inventaris/kondisi', $data);
		$this->load->view('templates/footer');
	}
	public function ubahKondisi($id)
	{
		$this->inventaris_m->UpdateKondisi($id);
		$this->session->set_flashdata("flash", '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                                                            Data Berhasil Diubah
                                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                            </button>
												</div>');
		redirect("inventaris/kondisi");
	}
	public function hapusKondisi($id)
	{
		$this->inventaris_m->DeleteKondisi($id);
		$this->session->set_flashdata("flash", '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                            Data Berhasil Dihapus
                                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                            </button>
												</div>');
		redirect("inventaris/kondisi");
	}
	public function tambahKondisi()
	{
		$this->inventaris_m->AddKondisi();
		$this->session->set_flashdata("flash", '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                                            Data Berhasil Ditambahkan
                                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                            </button>
                                                            </div>');
		redirect("inventaris/kondisi");
	}
}
