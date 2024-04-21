<?php

require_once APPPATH.'..\asset\fpdf\fpdf.php';
class Transaction extends CI_controller{
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
        $this->load->view('MenuPage/Form/tambah_range');
    }

    function store() {
        $range_awal = $this->input->post('range_awal');
		$range_akhir = $this->input->post('range_akhir');
		$biaya = $this->input->post('biaya');
 
		$data = array(
			'range_awal' => $range_awal,
			'range_akhir' => $range_akhir,
			'range' => $range_awal . " - " . $range_akhir . " m3",
            'biaya' => $biaya
			);
		$insert = $this->db->insert('range_pam', $data);
		if($insert) 
        {
            $this->ses->set_flashdata('sukses_tambah', 'data berhasil ditambah');
            
            redirect('range');
        }
    }

    function edit($range_id) {
        $data['d'] = $this->db->get_where('range_pam', ['range_id' => $range_id])->row();

        $this->load->view('MenuPage/Form/edit_range', $data);
    }

    function update() {
        $range_id = $this->input->post('range_id');
        $range_awal = $this->input->post('range_awal');
		$range_akhir = $this->input->post('range_akhir');
		$biaya = $this->input->post('biaya');
 
		$data = array(
			'range_awal' => $range_awal,
			'range_akhir' => $range_akhir,
			'range' => $range_awal . " - " . $range_akhir . " m3",
            'biaya' => $biaya
			);
		$update = $this->db->update('range_pam' ,$data, ['range_id' => $range_id]);
		if($update) 
        {
            $this->ses->set_flashdata('sukses_update', 'data berhasil dirubah');
            redirect('range');
        }
    }

    function delete($range_id) {
        $delete = $this->db->delete('range_pam', ['range_id' => $range_id]);
        if ($delete) {
            $this->ses->set_flashdata('sukses_delete', 'data berhasil dihapus');
            redirect('range');
        }
    }
}