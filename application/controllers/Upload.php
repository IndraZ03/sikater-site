<?php
class Upload extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //load Helper for Form
        $this->load->helper('url', 'form');
        $this->load->library('form_validation');
        $this->load->model('DatabaseEsign');
    }
    public function inskal()
    {
        $config['upload_path'] = './berkas/';
        $config['allowed_types'] = 'pdf|docx';


        $this->load->library('upload', $config);
        $dokumen = $this->input->post('dokumen');


        if (!$this->upload->do_upload('berkas')) {
            redirect('user/dokumen_inskal');
            $this->session->set_flashdata('pesan-gagal', '<div class="alert alert-danger" role="alert"> Dokumen Gagal Diajukan!</div>');
        } else {
            $nama_file = $this->upload->data('file_name');
            $path = sprintf('%s', $nama_file);
            date_default_timezone_set('Asia/Jakarta');
            $tanggal = date('Y-m-d H:i:s');
            $data = array('dokumen' => $dokumen, 'path' => $path, 'tanggal_pengajuan' => $tanggal);
            $this->DatabaseEsign->InsertDataDokumenInskal($data);
            $this->session->set_flashdata('pesan-sukses', '<div class="alert alert-success" role="alert"> Dokumen Berhasil Diajukan!</div>');
            redirect('user/dokumen_inskal');
        }
    }

    public function poolbar()
    {
        $config['upload_path'] = './berkas/';
        $config['allowed_types'] = 'pdf|docx';


        $this->load->library('upload', $config);
        $dokumen = $this->input->post('dokumen');


        if (!$this->upload->do_upload('berkas')) {
            redirect('user/dokumen_poolbar');
            $this->session->set_flashdata('pesan-gagal', '<div class="alert alert-danger" role="alert"> Dokumen Gagal Diajukan!</div>');
        } else {
            $nama_file = $this->upload->data('file_name');
            $path = sprintf('%s', $nama_file);
            date_default_timezone_set('Asia/Jakarta');
            $tanggal = date('Y-m-d H:i:s');
            $data = array('dokumen' => $dokumen, 'path' => $path, 'tanggal_pengajuan' => $tanggal);
            $this->DatabaseEsign->InsertDataDokumenPoolbar($data);
            $this->session->set_flashdata('pesan-sukses', '<div class="alert alert-success" role="alert"> Dokumen Berhasil Diajukan!</div>');
            redirect('user/dokumen_poolbar');
        }
    }


   


    public function logbook()
    {
        $order = $this->input->post('order');
        $tanggal = $this->input->post('tanggal');
        $instansi = $this->input->post('instansi');
        $nomor = $_POST['nomor'];
        $input1 = $_POST['input1'];
        $input2 = $_POST['input2'];
        $input3 = $_POST['input3'];
        $input4 = $_POST['input4'];
        $identifikasi= $_POST['identifikasi'];
        $pembayaran = 0;
        $kalibrasi = 0;
        $sertifikat = 0;
        $selesai = 0;
        $tanggal_k = $_POST['tanggal_k'];
        $petugas_kalibrasi1 = $_POST['petugas_kalibrasi1'];
        $petugas_kalibrasi2 = $_POST['petugas_kalibrasi2'];
        $petugas_kalibrasi3 = $_POST['petugas_kalibrasi3'];
        $total = count($identifikasi);
        
        
        if (!$this->input->post('order')) {
            $this->session->set_flashdata('pesan-gagal', '<div class="alert alert-danger" role="alert"> Data Gagal Ditambahkan!</div>');
            redirect('user/logbook');
           
        } else {
        for($i=0;$i<$total;$i++){
        $alat[$i] = $input1[$i]. "/" .$input2[$i]. "/" .$input3[$i]. "/" .$input4[$i];
        $petugas_array[$i] = array(
            $petugas_kalibrasi1[$i],
            $petugas_kalibrasi2[$i],
            $petugas_kalibrasi3[$i]
             );
        $petugas_kalibrasi = implode(", ", $petugas_array[$i]);
           
  
        $data1 = array(
            'order' => $order, 
            'nomor' => $nomor[$i],
            'identifikasi' => $identifikasi[$i],
            'alat'=>$alat[$i],
            'pembayaran'=>$pembayaran,
            'kalibrasi' => $kalibrasi,
            'sertifikat'=> $sertifikat,
            'selesai'=> $selesai,
            'tanggal_k'=>$tanggal_k[$i],
            'petugas_kalibrasi'=>$petugas_kalibrasi
        );

           
            $this->DatabaseEsign->InsertDataSubLogbook($data1);}

            $data = array(
                'order' => $order, 
                'tanggal' => $tanggal,
                'instansi' => $instansi
            );
            $this->DatabaseEsign->InsertDataLogbook($data);
            $this->session->set_flashdata('pesan-sukses', '<div class="alert alert-success" role="alert">Data Berhasil Ditambahkan!</div>');
            redirect('user/logbook');
        }
    }

    public function hapus_logbook()
    {
        $id = $this->input->post('id');
        $where = array(
            'id' => $id
        );
        $this->DatabaseEsign->hapus($where, 'sub_logbook');
        $this->session->set_flashdata('pesan-sukses-hapus', '<div class="alert alert-success" role="alert"> Berhasil Dihapus!</div>');
        redirect('user/logbook');
    }

    public function edit_logbook()
    {
        $idl = $this->input->post('idl');
        $ids = $this->input->post('ids');
        $where = array(
            'id' => $idl
        );
        $where1 = array(
            'id' => $ids
        );
        $order = $this->input->post('order');
        $tanggal = $this->input->post('tanggal');
        $instansi = $this->input->post('instansi');
        $nomor = $_POST['nomor'];
        $input1 = $_POST['input1'];
        $input2 = $_POST['input2'];
        $input3 = $_POST['input3'];
        $input4 = $_POST['input4'];
        $identifikasi= $_POST['identifikasi'];
        $pembayaran = 0;
        $kalibrasi = 0;
        $sertifikat = 0;
        $selesai = 0;
        $tanggal_k = $_POST['tanggal_k'];
        $petugas_kalibrasi1 = $_POST['petugas_kalibrasi1'];
        $petugas_kalibrasi2 = $_POST['petugas_kalibrasi2'];
        $petugas_kalibrasi3 = $_POST['petugas_kalibrasi3'];
        $total = count($identifikasi);
        
        
        if (!$this->input->post('order')) {
            $this->session->set_flashdata('pesan-gagal', '<div class="alert alert-danger" role="alert"> Data Gagal Ditambahkan!</div>');
            redirect('user/logbook');
           
        } else {
        for($i=0;$i<$total;$i++){
        $alat[$i] = $input1[$i]. "/" .$input2[$i]. "/" .$input3[$i]. "/" .$input4[$i];
        $petugas_array[$i] = array(
            $petugas_kalibrasi1[$i],
            $petugas_kalibrasi2[$i],
            $petugas_kalibrasi3[$i]
             );
        $petugas_kalibrasi = implode(", ", $petugas_array[$i]);
           
  
        $data1 = array(
            'order' => $order, 
            'nomor' => $nomor[$i],
            'identifikasi' => $identifikasi[$i],
            'alat'=>$alat[$i],
            'pembayaran'=>$pembayaran,
            'kalibrasi' => $kalibrasi,
            'sertifikat'=> $sertifikat,
            'selesai'=> $selesai,
            'tanggal_k'=>$tanggal_k[$i],
            'petugas_kalibrasi'=>$petugas_kalibrasi
        );

           
        $this->DatabaseEsign->EditLogbook($where1,$data1, 'sub_logbook');

        $data = array(
                'order' => $order, 
                'tanggal' => $tanggal,
                'instansi' => $instansi
            );
            $this->DatabaseEsign->EditLogbook($where,$data, 'logbook');
            $this->session->set_flashdata('pesan-sukses', '<div class="alert alert-success" role="alert">Data Berhasil Ditambahkan!</div>');
            redirect('user/logbook');
         }
    }
}
    




    public function status_kasubid_inskal()

    {
        $keterangan = $this->input->post('keterangan');
        $status = $this->input->post('status_kasubid');
        $id = $this->input->post('id');
        date_default_timezone_set('Asia/Jakarta');
        $tanggal_acc = date('Y-m-d H:i:s');
        $data_submit = array(
            'status_kasubid' => $status,
            'keterangan' => $keterangan,
            'tanggal_acc_k' => $tanggal_acc
        );
        $where = array(
            'id' => $id
        );
        $this->session->set_flashdata('konfirmasi', '<div class="alert alert-success" role="alert"> Dokumen Berhasil Dikonfirmasi!</div>');
        $this->DatabaseEsign->update_data($where, $data_submit, 'dokumen_inskal');
        redirect('user/dokumen_kasubid_inskal');
    }
    public function hapus_data_inskal()
    {
        $id = $this->input->post('id');
        $where = array(
            'id' => $id
        );
        $this->DatabaseEsign->hapus($where, 'dokumen_inskal');
        $this->session->set_flashdata('pesan-sukses-hapus', '<div class="alert alert-success" role="alert"> Dokumen Berhasil Dihapus!</div>');
        redirect('user/dokumen_inskal');
    }

    public function hapus_data_logbook()
    {
        $order = $this->input->post('order');
        $where = array(
            'order' => $order
        );
        $this->DatabaseEsign->hapus($where, 'logbook');
        $this->DatabaseEsign->hapus($where, 'sub_logbook');
        $this->session->set_flashdata('pesan-sukses-hapus', '<div class="alert alert-success" role="alert"> Dokumen Berhasil Dihapus!</div>');
        redirect('user/dokumen_inskal');
    }

    public function status_kasubid_poolbar()

    {
        $keterangan = $this->input->post('keterangan');
        $status = $this->input->post('status_kasubid');
        $id = $this->input->post('id');
        date_default_timezone_set('Asia/Jakarta');
        $tanggal_acc = date('Y-m-d H:i:s');
        $data_submit = array(
            'status_kasubid' => $status,
            'keterangan' => $keterangan,
            'tanggal_acc_k' => $tanggal_acc
        );
        $where = array(
            'id' => $id
        );
        $this->session->set_flashdata('konfirmasi', '<div class="alert alert-success" role="alert"> Dokumen Berhasil Dikonfirmasi!</div>');
        $this->DatabaseEsign->update_data($where, $data_submit, 'dokumen_poolbar');
        redirect('user/dokumen_kasubid_poolbar');
    }
    public function hapus_data_poolbar()
    {
        $id = $this->input->post('id');
        $where = array(
            'id' => $id
        );
        $this->DatabaseEsign->hapus($where, 'dokumen_poolbar');
        $this->session->set_flashdata('pesan-sukses-hapus', '<div class="alert alert-success" role="alert"> Dokumen Berhasil Dihapus!</div>');
        redirect('user/dokumen_poolbar');
    }
    public function status_kabid_inskal()

    {
        $keterangan = $this->input->post('keterangan');
        $status = $this->input->post('status_kabid');
        $id = $this->input->post('id');
        date_default_timezone_set('Asia/Jakarta');
        $tanggal_acc = date('Y-m-d H:i:s');
        $data_submit = array(
            'status_kabid' => $status,
            'keterangan' => $keterangan,
            'tanggal_acc_kd' => $tanggal_acc
        );
        $where = array(
            'id' => $id
        );
        $this->session->set_flashdata('konfirmasi', '<div class="alert alert-success" role="alert"> Dokumen Berhasil Dikonfirmasi!</div>');
        $this->DatabaseEsign->update_data($where, $data_submit, 'dokumen_inskal');
        redirect('user/bo_kabid_inskal');
    }
    public function status_kabid_poolbar()

    {
        $keterangan = $this->input->post('keterangan');
        $status = $this->input->post('status_kabid');
        $id = $this->input->post('id');
        date_default_timezone_set('Asia/Jakarta');
        $tanggal_acc = date('Y-m-d H:i:s');
        $data_submit = array(
            'status_kabid' => $status,
            'keterangan' => $keterangan,
            'tanggal_acc_kd' => $tanggal_acc
        );
        $where = array(
            'id' => $id
        );
        $this->session->set_flashdata('konfirmasi', '<div class="alert alert-success" role="alert"> Dokumen Berhasil Dikonfirmasi!</div>');
        $this->DatabaseEsign->update_data($where, $data_submit, 'dokumen_poolbar');
        redirect('user/bo_kabid_poolbar');
    }

    public function status_kabal_inskal()

    {
        $keterangan = $this->input->post('keterangan');
        $status = $this->input->post('status_kabal');
        $id = $this->input->post('id');
        date_default_timezone_set('Asia/Jakarta');
        $tanggal_acc = date('Y-m-d H:i:s');
        $data_submit = array(
            'status_kabal' => $status,
            'keterangan' => $keterangan,
            'tanggal_acc_kb' => $tanggal_acc
        );
        $where = array(
            'id' => $id
        );
        $this->session->set_flashdata('konfirmasi', '<div class="alert alert-success" role="alert"> Dokumen Berhasil Dikonfirmasi!</div>');
        $this->DatabaseEsign->update_data($where, $data_submit, 'dokumen_inskal');
        redirect('balai/kabal_inskal');
    }
    public function status_kabal_poolbar()

    {
        $keterangan = $this->input->post('keterangan');
        $status = $this->input->post('status_kabal');
        $id = $this->input->post('id');
        date_default_timezone_set('Asia/Jakarta');
        $tanggal_acc = date('Y-m-d H:i:s');
        $data_submit = array(
            'status_kabal' => $status,
            'keterangan' => $keterangan,
            'tanggal_acc_kb' => $tanggal_acc
        );
        $where = array(
            'id' => $id
        );
        $this->session->set_flashdata('konfirmasi', '<div class="alert alert-success" role="alert"> Dokumen Berhasil Dikonfirmasi!</div>');
        $this->DatabaseEsign->update_data($where, $data_submit, 'dokumen_poolbar');
        redirect('balai/kabal_poolbar');
    }
    public function download_sekbal_inskal()
    {
        $config['upload_path'] = './download/';
        $config['allowed_types'] = 'pdf|docx';


        $this->load->library('upload', $config);
        $id = $this->input->post('id');
        $status = $this->input->post('status_sekbal');

        if (!$this->upload->do_upload('download')) {
            redirect('balai/sekbal_inskal');
            $this->session->set_flashdata('pesan-gagal', '<div class="alert alert-danger" role="alert"> Dokumen Gagal Diupload!</div>');
        } else {
            $nama_file = $this->upload->data('file_name');
            $path = sprintf('%s', $nama_file);
            date_default_timezone_set('Asia/Jakarta');
            $tanggal = date('Y-m-d H:i:s');
            $where = array(
                'id' => $id
            );
            $data = array('download' => $path, 'status_sekbal' => $status, 'tanggal_acc_s' => $tanggal);
            $this->DatabaseEsign->update_data($where, $data, 'dokumen_inskal');;
            $this->session->set_flashdata('pesan-sukses', '<div class="alert alert-success" role="alert"> Dokumen Berhasil Dikirim!</div>');
            redirect('balai/sekbal_inskal');
        }
    }

    public function download_sekbal_poolbar()
    {
        $config['upload_path'] = './download/';
        $config['allowed_types'] = 'pdf|docx';


        $this->load->library('upload', $config);
        $id = $this->input->post('id');
        $status = $this->input->post('status_sekbal');

        if (!$this->upload->do_upload('download')) {
            redirect('balai/sekbal_poolbar');
            $this->session->set_flashdata('pesan-gagal', '<div class="alert alert-danger" role="alert"> Dokumen Gagal Diupload!</div>');
        } else {
            $nama_file = $this->upload->data('file_name');
            $path = sprintf('%s', $nama_file);
            date_default_timezone_set('Asia/Jakarta');
            $tanggal = date('Y-m-d H:i:s');
            $where = array(
                'id' => $id
            );
            $data = array('download' => $path, 'status_sekbal' => $status, 'tanggal_acc_s' => $tanggal);
            $this->DatabaseEsign->update_data($where, $data, 'dokumen_poolbar');;
            $this->session->set_flashdata('pesan-sukses', '<div class="alert alert-success" role="alert"> Dokumen Berhasil Dikirim!</div>');
            redirect('balai/sekbal_inskal');
        }
    }
}
