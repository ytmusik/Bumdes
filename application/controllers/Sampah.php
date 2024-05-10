<?php

require_once APPPATH.'..\asset\fpdf\fpdf.php';
class Sampah extends CI_controller{
    function __construct(){
        parent:: __construct();
		date_default_timezone_set('Asia/Jakarta');
        $this->PDF = new FPDF();
        $this->bulan = ['01'=>'Januari','02'=>'Februari','03'=>'Maret','04'=>'April','05'=>'Mei','06'=>'Juni','07'=>'Juli','08'=>'Agustus','09'=>'September','10'=>'Oktober','11'=>'November','12'=>'Desember'];
        $this->waktu = date('Y-m-d H:i:s');
        if (!$this->ses->log_s||$this->ses->tp!='MNG') {
			redirect(base_url());
        }
    }

    function index() {
        $data['transaksi'] = $this->db->get('transaksi_sampah')->result();
        $this->load->view('MenuPage/Main/transaksi_sampah_list', $data);
    }

    function tambah() {
        $this->load->view('MenuPage/Form/tambah_transaksi_sampah');
    }

    function store() {
        $user_id = $this->input->post('user_id');
		$bulan = $this->input->post('bulan');
		$tahun = $this->input->post('tahun');
        $status = 0;
        $tagihan = 15000;

		$data = array(
            'user_id' => $user_id,
			'bulan' => $bulan,
			'tahun' => $tahun,
            'status' => $status,
			'tagihan' => $tagihan,
			);
		$insert = $this->db->insert('transaksi_sampah', $data);
		if($insert) 
        {
            $this->ses->set_flashdata('sukses_tambah', 'data berhasil ditambah');
            
            redirect('transaksi_sampah');
        }
    }

    function edit($transaksi_id) {
        $data['d'] = $this->db->get_where('transaksi_sampah', ['transaksi_id' => $transaksi_id])->row();

        $this->load->view('MenuPage/Form/edit_transaksi_sampah', $data);
    }

    function update() {
		$bayar = $this->input->post('bayar');
		$tanggal_bayar = date('Y-m-d');
        $status = 1;
        $transaksi_id = $this->input->post('transaksi_id');
		$data = array(
			'bayar' => $bayar,
			'tanggal_bayar' => $tanggal_bayar,
			'status' => $status,
        );
		$update = $this->db->update('transaksi_sampah' ,$data, ['transaksi_id' => $transaksi_id]);
		if($update) 
        {
            $this->ses->set_flashdata('sukses_update', 'data berhasil dirubah');
            redirect('transaksi_sampah');
        }
    }
    
    function cetak(){
        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');

        $this->load->library('pdfgenerator');
        $data['title'] = "Data Transaksi Sampah";
        $file_pdf = $data['title'];

        $this->db->select('transaksi_sampah.*, user.*');
        $this->db->from('transaksi_sampah');
        $this->db->join('user', 'user.user_id = transaksi_sampah.user_id');
        $this->db->where('transaksi_sampah.bulan', $bulan);
        $this->db->where('transaksi_sampah.tahun', $tahun);
        $data['transaksi'] = $this->db->get()->result();

        $paper = 'A4';
        $orientation = "landscape";
        $html = $this->load->view('MenuPage/Detail_Print/detail_transaksi_sampah', $data, true);
        $this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
    }
}