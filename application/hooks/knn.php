<?php

#[\AllowDynamicProperties]
class KnnHelper
{
    public function __construct()
    {
        $this->M_Knn_Balita_Constant = new M_Knn_Balita_Constant();
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
}
