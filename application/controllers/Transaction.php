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

    function index(){

        $this->load->view('MenuPage/Main/transaction_list');
    }
}