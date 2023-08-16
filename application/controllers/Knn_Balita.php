<?php

class Knn_Balita extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library("pagination");
        $this->load->library('form_validation');
        $this->load->model("M_data_balita_uji");
        $this->load->model('ModelPosyandu');
        $this->load->model('M_Knn_Balita_Constant');
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


    public function add()
    {
        $this->load->view('templates/header-datatables');
        $this->load->view('templates/sidebar');
        $this->load->view('knn/input');
        $this->load->view('templates/footer-datatables');
    }


    public function create()
    {
        $idBalita = $_POST['idBalita'];
        $namaBayi = $_POST['namaBayi'];
        $tempatLahir = $_POST['tempatLahir'];
        $tanggalLahir = $_POST['tanggalLahir'];
        $jenisKelamin = $_POST['jenisKelamin'];
        $alamat = $_POST['alamat'];
        $namaIbu = $_POST['namaIbu'];
        $namaAyah = $_POST['namaAyah'];

        $umur = $_POST['umur'];
        $beratLahir = $_POST['beratLahir'];
        $panjangLahir = $_POST['panjangLahir'];
        $telp_ibu = $_POST['telp_ibu'];
        $lingkar_kepala = $_POST['lingkar_kepala'];
        $goldar = $_POST['goldar'];

        $now = date("Y-m-d");
        $datetime1 = new DateTime($tanggalLahir);
        $datetime2 = new DateTime($now);
        $difference = $datetime1->diff($datetime2)->days;
        if (
            !isset($namaBayi) || trim($namaBayi) == '' || !isset($tempatLahir) || trim($tempatLahir) == '' ||
            !isset($namaIbu) || trim($namaIbu) == '' || !isset($namaAyah) || trim($namaAyah) == '' || !isset($alamat) || trim($alamat) == '' ||
            !isset($tanggalLahir) || trim($tanggalLahir) == '' || !isset($jenisKelamin) || trim($jenisKelamin) == ''
        ) {
            redirect('Balita/add');
        } else {
            $balita = array(
                'idBalita' => $idBalita,
                'namaBayi' => $namaBayi,
                'namaIbu' => $namaIbu,
                'namaAyah' => $namaAyah,
                'alamat' => $alamat,
                'tempatLahir' => $tempatLahir,
                'tanggalLahir' => $tanggalLahir,

                'umur' => $umur,
                'panjangLahir' => $panjangLahir,
                'lingkar_kepala' => $lingkar_kepala,
                'beratLahir' => $beratLahir,
                'telp_ibu' => $telp_ibu,
                'goldar' => $goldar,

                'jenisKelamin' => $jenisKelamin
            );
            $res = $this->ModelPosyandu->addData('balita', $balita);
            $balita = $this->db->query("SELECT * FROM balita ORDER BY id DESC LIMIT 1")->result_array()[0];
            $bbuData = $this->getBBU($balita);
            $tbuData = $this->getTBU($balita);
            $bbtbData = $this->getBBTB($balita);

            $newBalita = array(0 => array(
                'bbu' => $bbuData['bbu'], 'tbu' => $tbuData['tbu'], 'bbtb' => $bbtbData['bbtb'],
                'bbu_label' => $bbuData['label'], 'tbu_label' => $tbuData['label'], 'bbtb_label' => $bbtbData['label'],
                'jenis_kelamin' => $balita['jenisKelamin'] == "Laki-Laki" ? 1 : 0,
                'usia' => $balita['umur'], 'id_balita' => $balita['id'],
                'tinggi_badan' => $balita['panjangLahir'], 'berat_badan' => $balita['beratLahir'],
                'lingkar_kepala' => $balita['lingkar_kepala']
            ));

            $this->M_data_balita_uji->create($newBalita);

            // if ($res >= 1) {
            //     $this->session->set_flashdata('msg', 'Berhasil ditambahkan ke data uji');
            //     redirect('knn_balita');
            // }
        }
    }


    public function index()
    {
        $data['title'] = 'Penimbangan Balita | Sistem Informasi Stunting';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $balita['balitaDataUji'] =
            $this->M_data_balita_uji->read();


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header-datatables', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('knn/calculate', array('balitaDataUji' => $balita['balitaDataUji']));
            $this->load->view('templates/footer-datatables');
        }
    }
    public function uji()
    {
        if (!($_POST)) redirect(site_url('admin/data_uji'));

        $data_id = $this->input->post('data_id');
        // $data_uji = $this->m_data_uji_normalized->read_single_table( $data_id , "array" );
        $data_uji = $this->m_data_uji_normalized->read($data_id, "array");
        $data_testing = $this->m_data_testing_normalized->read(-1, "array");

        $min_max = $this->m_data_testing->get_min_max();
        // echo json_encode( $data_uji ).'<br>' ;
        // return;
        if (empty($data_uji) || empty($data_testing)) {
            redirect(site_url('admin/data_uji'));
            return;
        }

        if (empty($data_uji)) {
            redirect(site_url('/data_uji'));
            return;
        }
        $DISTANCES = array();
        //prosedur mencari tetangga terdekat
        for ($i = 0; $i < count($data_uji); $i++) {
            $DISTANCES = array();
            for ($j = 0; $j < count($data_testing); $j++) {
                $dist['distance'] = $this->distance($data_uji[$i], $data_testing[$j]);
                $dist['data_label'] = $data_testing[$j]['data_label'];
                $dist['data_name'] = $data_testing[$j]['data_name'];

                array_push($DISTANCES, $dist);
            }
            sort($DISTANCES); //mengurutkan distance dari terdekat

            $K_VALUE = $this->input->post('k_value');
            $NEIGHBOUR = array();
            for ($k = 0; $k < $K_VALUE; $k++) //memetakan tetangga
            {
                if (!isset($NEIGHBOUR[$DISTANCES[$k]['data_label']]))
                    $NEIGHBOUR[$DISTANCES[$k]['data_label']] = array();

                array_push($NEIGHBOUR[$DISTANCES[$k]['data_label']], $DISTANCES[$k]);
            }

            $terbesar =  array(); //mencari tetangga terbanyak
            foreach (array_keys($NEIGHBOUR) as $paramName) {

                if (count($NEIGHBOUR[$paramName])  > count($terbesar)) {
                    $terbesar = $NEIGHBOUR[$paramName];
                }
            }

            $data_uji[$i]['data_label'] = $terbesar[0]['data_label']; //update nilai label (lulus / tidak lulus)
        }

        $data["K_VALUE"] = $K_VALUE;
        $data["NEIGHBOURS"] = $NEIGHBOUR;

        $data["distances"] = $DISTANCES;
        //ubah ke array object
        foreach ($data["distances"]  as  $ind => $val) {
            $data["distances"][$ind] = (object) $data["distances"][$ind];
        }
        $data["data_uji"] = $data_uji;
        //ubah ke array object
        foreach ($data["data_uji"]  as  $ind => $val) {
            $data["data_uji"][$ind] = (object) $data_uji[$ind];
            unset($data_uji[$ind]['user_profile_fullname']);
        }
        // echo json_encode( $data_uji ).'<br>' ;

        // update data uji
        $this->m_data_uji_normalized->_update_batch($data_uji);

        $data['page_name'] = "Hasil Data Uji";
        $this->load->view("_admin/_template/header");
        $this->load->view("_admin/_template/sidebar_menu");
        $this->load->view("_admin/data_uji/View_detail_uji", $data);
        $this->load->view("_admin/_template/footer");
    }
}
