<?php

require_once APPPATH.'..\asset\fpdf\fpdf.php';
class Frontend extends CI_controller{
    public function index() {
        $this->db->select('*');
        $this->db->from('transaksi_pam');
        $this->db->join('user','user.user_id=transaksi_pam.user_id');
        if($this->input->post('user_id')) {
            $this->db->where('transaksi_pam.user_id', $this->input->post('user_id'));
            $result = $this->db->get();
            $data['transaksi_pam'] = $result->result();

			$this->db->select('*');
			$this->db->from('transaksi_sampah');
			$this->db->join('user','user.user_id=transaksi_sampah.user_id');
			$this->db->where('transaksi_sampah.user_id', $this->input->post('user_id'));
            $result = $this->db->get();
            $data['transaksi_sampah'] = $result->result();
			// print_r($data['transaksi_sampah']);die();

            if($data['transaksi_pam'] != NULL) {
                $this->ses->set_flashdata('ada', 'data berhasil ditemukan');
            } else {
                $this->ses->set_flashdata('tidak_ada', 'data berhasil ditambah');
            }
            $this->load->view('MenuPage/main/frontend', $data);
        } else {
            $this->load->view('MenuPage/main/frontend');
        }
    }
}
