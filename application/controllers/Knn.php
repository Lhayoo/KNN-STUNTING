<?php

defined('BASEPATH') or exit('No direct script access allowed');



#[\AllowDynamicProperties]
class Knn extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // $this->output->enable_profiler(TRUE);
        // $this->load->model("m_login");
        // $this->load->model("m_data_testing");
        // $this->load->model("m_data_testing_normalized");
        // $this->load->model("m_register");
        // $this->load->model("m_admin");
        // $this->load->model("m_user");
        // $this->load->model("m_log");
        // $this->load->helper('array');
        $this->load->library("pagination");
        $this->load->library('form_validation');
        $this->load->model('ModelPosyandu');
        $this->load->model("M_data_balita_testing_normalized");
        $this->load->model("M_data_balita_testing");
    }


    public function index()
    {
        $data['title'] = 'Penimbangan Balita | Sistem Informasi Stunting';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $balita['balitaData'] = $this->M_data_balita_testing->read();
        $balita['balitaDataNormalized'] =
            $this->M_data_balita_testing_normalized->read();


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header-datatables', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('knn/index', array('balitaData' => $balita['balitaData'], 'balitaDataNormalized' => $balita['balitaDataNormalized']));
            $this->load->view('templates/footer-datatables');
        }
    }


    public function normalize()
    {
        $this->M_data_balita_testing_normalized->clear(); //kosongka normalisasi
        $files = $this->M_data_balita_testing->read();
        $min_max = $this->M_data_balita_testing->get_min_max();

        if (empty($min_max)) {
            redirect(site_url('admin/data_testing'));
            return;
        }

        echo "<div style='white-space:pre-wrap'>" . var_export($min_max, true) . "</div>";

        $newDataArray = [];

        // echo json_encode( $min_max );
        // prosedur untuk menormalisasi
        for ($i = 0; $i < count($files); $i++) {
            if ($files[$i]->bbtb_label == "INVALID") {
                continue;
            }

            // echo round( $files[ $i ]->data_UKT,3)."<br>";
            $len = $min_max["max_data_bbu"] -  $min_max["min_data_bbu"];
            $files[$i]->bbu  =  (($files[$i]->bbu - $min_max["min_data_bbu"]) / ($len)) * 1 + 0;
            $files[$i]->bbu = round($files[$i]->bbu, 4);

            $len = $min_max["max_data_tbu"] -  $min_max["min_data_tbu"];
            $files[$i]->tbu  =  (($files[$i]->tbu - $min_max["min_data_tbu"]) / ($len)) * 1 + 0;
            $files[$i]->tbu = round($files[$i]->tbu, 4);

            $len = $min_max["max_data_bbtb"] -  $min_max["min_data_bbtb"];
            $files[$i]->bbtb  =  (($files[$i]->bbtb - $min_max["min_data_bbtb"]) / ($len)) * 1 + 0;
            $files[$i]->bbtb = round($files[$i]->bbtb, 4);

            array_push($newDataArray, array(
                'bbu' => $files[$i]->bbu, 'tbu' => $files[$i]->tbu, 'bbtb' => $files[$i]->bbtb,
                'bbu_label' => $files[$i]->bbu_label, 'tbu_label' => $files[$i]->tbu_label, 'bbtb_label' => $files[$i]->bbtb_label,
                'jenis_kelamin' => $files[$i]->jenis_kelamin,
                'usia' => $files[$i]->umur, 'id_balita' => $files[$i]->id,
                'tinggi_badan' => $files[$i]->panjangLahir, 'berat_badan' => $files[$i]->beratLahir,
                'lingkar_kepala' => $files[$i]->lingkar_kepala
            ));
        }

        if ($this->M_data_balita_testing_normalized->create($newDataArray)) {
            $this->session->set_flashdata('info', array(
                'from' => 1,
                'message' =>  'item berhasil di normalisasi'
            ));
            redirect(site_url('knn'));
            return;
        }
        $this->session->set_flashdata('info', array(
            'from' => 0,
            'message' =>  'terjadi kesalahan saat mengirim data'
        ));
        redirect(site_url('knn'));
    }

    public function getBBTB($dataBalita)
    {
        if ($dataBalita['jenisKelamin'] == "Laki-Laki") {
            if ($dataBalita['umur'] <= 24) {
                $BBUARRAY = $this->M_Knn_Balita_Constant->BBTB_CONSTANT_ARRAY_MALE_24MONTH();
            } else {
                $BBUARRAY = $this->M_Knn_Balita_Constant->BBTB_CONSTANT_ARRAY_MALE_60MONTH();
            }
        } else {
            if ($dataBalita['umur'] <= 24) {
                $BBUARRAY = $this->M_Knn_Balita_Constant->BBTB_CONSTANT_ARRAY_FEMALE_24MONTH();
            } else {
                $BBUARRAY = $this->M_Knn_Balita_Constant->BBTB_CONSTANT_ARRAY_FEMALE_60MONTH();
            }
        }

        $BBTB = 0;

        foreach ($BBUARRAY as $data) {
            if (round($dataBalita['panjangLahir'], 1) < 45) {
                $BBUREFRENCE = $BBUARRAY[0];
                break;
            }
            if ($data['tinggi'] == round($dataBalita['panjangLahir'], 1)) {
                $BBUREFRENCE = $data;
                break;
            }
        }

        if (!isset($BBUREFRENCE)) {
            $bbtbData['bbtb'] = -999999;
            $bbtbData['label'] = "INVALID";
            return $bbtbData;
        }

        if ($dataBalita['beratLahir'] < $BBUREFRENCE['MED']) {
            $BBTB = ($dataBalita['beratLahir'] - $BBUREFRENCE['MED']) / ($BBUREFRENCE['MED'] - $BBUREFRENCE['-1SD']);
        } else {
            $BBTB = ($dataBalita['beratLahir'] - $BBUREFRENCE['MED']) / ($BBUREFRENCE['+1SD'] - $BBUREFRENCE['MED']);
        }

        $bbtbData['bbtb'] = $BBTB;
        switch ($BBTB) {
            case $BBTB < $BBUREFRENCE['-3SD']:
                $bbtbData['label'] = "Gizi Buruk";
                break;
            case $BBTB >= $BBUREFRENCE['-3SD'] && $BBTB < $BBUREFRENCE['-2SD']:
                $bbtbData['label'] = "Gizi Kurang";
                break;
            case $BBTB >= $BBUREFRENCE['-2SD'] && $BBTB < $BBUREFRENCE['+1SD']:
                $bbtbData['label'] = "Gizi Baik";
                break;
            case $BBTB >= $BBUREFRENCE['+1SD'] && $BBTB < $BBUREFRENCE['+2SD']:
                $bbtbData['label'] = "Berisiko gizi lebih";
                break;
            case $BBTB >= $BBUREFRENCE['+2SD'] && $BBTB < $BBUREFRENCE['+3SD']:
                $bbtbData['label'] = "Gizi lebih";
                break;
            case $BBTB > $BBUREFRENCE['+3SD']:
                $bbtbData['label'] = "Obesitas";
                break;
        }



        return $bbtbData;
    }

    public function getTBU($dataBalita)
    {
        if ($dataBalita['jenisKelamin'] == "Laki-Laki") {
            $BBUARRAY = $this->M_Knn_Balita_Constant->TBU_CONSTANT_ARRAY_MALE();
        } else {
            $BBUARRAY = $this->M_Knn_Balita_Constant->TBU_CONSTANT_ARRAY_FEMALE();
        }

        $TBU = 0;

        foreach ($BBUARRAY as $data) {
            if ($data['umur'] == $dataBalita['umur']) {
                $BBUREFRENCE = $data;
            }
        }

        if (!isset($BBUREFRENCE)) {
            return $TBU;
        }

        if ($dataBalita['panjangLahir'] < $BBUREFRENCE['MED']) {
            $TBU = ($dataBalita['panjangLahir'] - $BBUREFRENCE['MED']) / ($BBUREFRENCE['MED'] - $BBUREFRENCE['-1SD']);
        } else {
            $TBU = ($dataBalita['panjangLahir'] - $BBUREFRENCE['MED']) / ($BBUREFRENCE['+1SD'] - $BBUREFRENCE['MED']);
        }

        $tbuData['tbu'] = $TBU;
        switch ($TBU) {
            case $TBU < $BBUREFRENCE['-3SD']:
                $tbuData['label'] = "S. Pendek";
                break;
            case $TBU >= $BBUREFRENCE['-3SD'] && $TBU < $BBUREFRENCE['-2SD']:
                $tbuData['label'] = "Pendek";
                break;
            case $TBU >= $BBUREFRENCE['-2SD'] && $TBU < $BBUREFRENCE['+3SD']:
                $tbuData['label'] = "Normal";
                break;
            case $TBU > $BBUREFRENCE['+3SD']:
                $tbuData['label'] = "S. Tinggi";
                break;
        }

        return $tbuData;
    }

    public function getBBU($dataBalita)
    {
        if ($dataBalita['jenisKelamin'] == "Laki-Laki") {
            $BBUARRAY = $this->M_Knn_Balita_Constant->BBU_CONSTANT_ARRAY_MALE();
        } else {
            $BBUARRAY = $this->M_Knn_Balita_Constant->BBU_CONSTANT_ARRAY_FEMALE();
        }

        $Bbu = 0;

        foreach ($BBUARRAY as $data) {
            if ($data['umur'] == $dataBalita['umur']) {
                $BBUREFRENCE = $data;
            }
        }

        if (!isset($BBUREFRENCE)) {
            return $Bbu;
        }

        if ($dataBalita['beratLahir'] < $BBUREFRENCE['MED']) {
            $Bbu = ($dataBalita['beratLahir'] - $BBUREFRENCE['MED']) / ($BBUREFRENCE['MED'] - $BBUREFRENCE['-1SD']);
        } else {
            $Bbu = ($dataBalita['beratLahir'] - $BBUREFRENCE['MED']) / ($BBUREFRENCE['+1SD'] - $BBUREFRENCE['MED']);
        }

        $bbuData['bbu'] = $Bbu;
        switch ($Bbu) {
            case $Bbu <= $BBUREFRENCE['-3SD']:
                $bbuData['label'] = "BB. S. kurang";
                break;
            case $Bbu > $BBUREFRENCE['-3SD'] && $Bbu <= $BBUREFRENCE['-2SD']:
                $bbuData['label'] = "BB. kurang";
                break;
            case $Bbu > $BBUREFRENCE['-2SD'] && $Bbu <= $BBUREFRENCE['+1SD']:
                $bbuData['label'] = "BB. Normal";
                break;
            case $Bbu > $BBUREFRENCE['+1SD']:
                $bbuData['label'] = "BB. Lebih";
                break;
        }

        return $bbuData;
    }



    public function import()
    {
        $this->load->model('M_Knn_Balita_Constant');

        $balitaEntries = $this->ModelPosyandu->getData('balita', '*');
        $balitaNewArray = [];

        foreach ($balitaEntries as $balita) {
            $bbuData = $this->getBBU($balita);
            $tbuData = $this->getTBU($balita);
            $bbtbData = $this->getBBTB($balita);

            $newBalita = array(
                'bbu' => $bbuData['bbu'], 'tbu' => $tbuData['tbu'], 'bbtb' => $bbtbData['bbtb'],
                'bbu_label' => $bbuData['label'], 'tbu_label' => $tbuData['label'], 'bbtb_label' => $bbtbData['label'],
                'jenis_kelamin' => $balita['jenisKelamin'] == "Laki-Laki" ? 1 : 0,
                'usia' => $balita['umur'], 'id_balita' => $balita['id'],
                'tinggi_badan' => $balita['panjangLahir'], 'berat_badan' => $balita['beratLahir'],
                'lingkar_kepala' => $balita['lingkar_kepala']
            );

            array_push($balitaNewArray, $newBalita);
        }
        $this->M_data_balita_testing->create($balitaNewArray);
        redirect(site_url("/Knn"));

        // $balitaDividedByUmur = [];
        // foreach ($balitaEntries as $balita) {
        //     if (!isset($balitaDividedByUmur[$balita['umur']])) {
        //         $balitaDividedByUmur[$balita['umur']] = array("{$balita['id']}" => array('panjang_badan' => $balita['panjangLahir'], 'berat_badan' =>  $balita['beratLahir'], 'lingkar_kepala' =>  $balita['lingkar_kepala']));
        //     } else {
        //         $balitaDividedByUmur[$balita['umur']]["{$balita['id']}"] = array('panjang_badan' => $balita['panjangLahir'], 'berat_badan' =>  $balita['beratLahir'], 'lingkar_kepala' =>  $balita['lingkar_kepala']);
        //     }
        // }

        // echo "<div style='white-space:pre-wrap'>" . var_export($balitaDividedByUmur, true) . "</div>";

        // foreach ($balitaDividedByUmur as $b) {
        //     $n = 0;
        //     $sumBeratBadan = 0;
        //     $medianBeratBadan = 0;
        //     foreach ($b as $balita) {

        //         $n++;
        //         echo "<div style='white-space:pre-wrap'>" . var_export($balita, true) . "</div>";
        //     }
        // }

        // foreach ($balitaEntries as $balita) {
        //     $newBalita['id_balita'] = $balita['id'];
        //     $newBalita['tinggi_badan'] = $balita['panjangLahir'];
        //     $newBalita['berat_badan'] = $balita['beratLahir'];
        //     $newBalita['lingkar_kepala'] = $balita['lingkar_kepala'];
        //     $newBalita['status'] = $this->hitungBBUlaki($balita);
        //     $this->M_data_balita_testing->create($newBalita);
        // }
        // redirect(site_url("/Knn"));
    }

    public function delete($data_id = null)
    {
        if ($data_id == null) redirect(site_url('admin/data_testing'));

        $data_param['data_id'] = $data_id;
        if ($this->m_data_testing->delete($data_param)) {
            $this->session->set_flashdata('info', array(
                'from' => 1,
                'message' =>  'item berhasil diubah'
            ));
            redirect(site_url('admin/data_testing'));
            return;
        }
        $this->session->set_flashdata('info', array(
            'from' => 0,
            'message' =>  'terjadi kesalahan saat mengirim data'
        ));
        redirect(site_url('admin/data_testing'));
    }
}
