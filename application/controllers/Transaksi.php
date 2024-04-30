<?php

require_once APPPATH.'..\asset\fpdf\fpdf.php';
class Transaksi extends CI_controller{
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
        $data['transaksi'] = $this->db->get('transaksi_pam')->result();
        $this->load->view('MenuPage/Main/transaksi_list', $data);
    }

    function tambah() {
        $this->load->view('MenuPage/Form/tambah_transaksi');
    }

    function store() {
        $user_id = $this->input->post('user_id');
        $range_awal = $this->input->post('range_awal');
		$range_akhir = $this->input->post('range_akhir');
		$bulan = $this->input->post('bulan');
		$tahun = $this->input->post('tahun');
		$selisih = ($range_akhir - $range_awal);
        
        // get range
        $range = $this->db->get('range_pam')->result();
        foreach($range as $r) {
            if($selisih >= $r->range_awal && $selisih <= $r->range_akhir) {
                $total_penggunaan = $selisih * $r->biaya;
            }
        }
        $status = 0;
        $total_biaya = $total_penggunaan + 5000;

		$data = array(
            'user_id' => $user_id,
            'range_awal' => $range_awal,
			'range_akhir' => $range_akhir,
			'bulan' => $bulan,
			'tahun' => $tahun,
			'total_penggunaan' => $total_penggunaan,
            'status' => $status,
            'total_biaya' => $total_biaya,
			);
		$insert = $this->db->insert('transaksi_pam', $data);
		if($insert) 
        {
            $this->ses->set_flashdata('sukses_tambah', 'data berhasil ditambah');
            
            redirect('transaksi');
        }
    }

    function edit($transaksi_id) {
        $data['d'] = $this->db->get_where('transaksi_pam', ['transaksi_id' => $transaksi_id])->row();

        $this->load->view('MenuPage/Form/edit_transaksi', $data);
    }

    function update() {
		$bayar = $this->input->post('bayar');
        $status = 1;
        $transaksi_id = $this->input->post('transaksi_id');
		$data = array(
			'bayar' => $bayar,
			'status' => $status,
        );
		$update = $this->db->update('transaksi_pam' ,$data, ['transaksi_id' => $transaksi_id]);
		if($update) 
        {
            $this->ses->set_flashdata('sukses_update', 'data berhasil dirubah');
            redirect('transaksi');
        }
    }
    
    function cetak(){
        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');

        $this->load->library('pdfgenerator');
        $data['title'] = "Data Transaksi PAM";
        $file_pdf = $data['title'];

        $this->db->select('transaksi_pam.*, user.*');
        $this->db->from('transaksi_pam');
        $this->db->join('user', 'user.user_id = transaksi_pam.user_id');
        $this->db->where('transaksi_pam.bulan', $bulan);
        $this->db->where('transaksi_pam.tahun', $tahun);
        $data['transaksi'] = $this->db->get()->result();

        $paper = 'A4';
        $orientation = "landscape";
        $html = $this->load->view('MenuPage/Detail_Print/detail_transaksi', $data, true);
        $this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
    }
}