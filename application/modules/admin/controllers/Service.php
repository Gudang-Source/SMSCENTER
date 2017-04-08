<?php
defined('BASEPATH') OR exit('No direct script access allowed');
setlocale(LC_TIME, 'ID_id'); 
setlocale(LC_ALL, 'id_ID');

class Service extends MX_Controller {
    private $inbox;
    private $outbox;
    private $sentitems;
    private $kontak;
    private $grup;
    function __construct() {
        parent::__construct();
        $this->load->model('Gmodel');
        require_once(APPPATH.'modules/inbox/controllers/Inbox.php');   
        $this->inbox = new Inbox();
        $this->output->delete_cache();
    }
    function index(){
        // show the form
        $this->load->view('main_html/content/service');
    }
    function getallsms(){
        $reply = "";
        // get all inbox
        $data = $this->inbox->data('Processed');
        foreach ($data->result_array() as $row) {
            $allWord = explode("#", $row['TextDecoded']);
            if(count($allWord)>1){
                // masuk kriteria
                $selectData['key1'] = $allWord[0];
                $selectData['key2'] = $allWord[1];
                $getDataReply = $this->Gmodel->select($selectData, 'autoreply');
                if($getDataReply->num_rows() > 0){
                    if($getDataReply->row()->key3 != null){
                        $typeData = explode(":", $getDataReply->row()->key3);
                        $returnData = explode(":", $getDataReply->row()->result);

                        $reply = $returnData[1]." ".$allWord[2];
                    }else{
                        $returnData = explode(":", $getDataReply->row()->result);
                        $reply = $returnData[1];
                    }
                }else{
                    $reply = "Maaf, Format Anda Salah";
                }
                $this->reply($row['SenderNumber'], $reply);                
            }
            $this->updateprocessed($row['ID']);
        }
        $this->getBirthDay();
    }
    function updateprocessed($ID=null){
        if($ID != null){
            $condition['ID'] = $ID;
            $data['Processed'] = "true";
            $tabel = "inbox";
            $this->Gmodel->update($condition, $data, $tabel);
        }
    }
    function reply($DestinationNumber, $TextReply){
        $dataInsert['DestinationNumber'] = $DestinationNumber;
        $dataInsert['TextDecoded'] = $TextReply;
        $dataInsert['CreatorID'] = 'Gammu 1.37.0';
        $insertData = $this->Gmodel->insert($dataInsert, 'outbox');
        return $insertData;
    }
    function getBirthDay(){
        // $thisDay = date('dd/mm/YY');
        $tanggalSekarang    = date('d');
        $bulanSekarang      = date('m');
        $tahunSekarang      = date('y');

        $dataSelectDate['tanggal']  =   $tanggalSekarang;
        $dataSelectDate['bulan']    =   $bulanSekarang;
        $dataSelectDate['tahun']    =   $tahunSekarang;

        $checkThisDate      =   $this->Gmodel->select($dataSelectDate, 'birthday_sent');
        if($checkThisDate->num_rows() < 1){        
            $getAllDataKontak = $this->Gmodel->get('kontak');
            if($getAllDataKontak->num_rows() > 0){
                foreach ($getAllDataKontak->result_array() as $rowDataKontak) {
                    $birthDayKontak = $rowDataKontak['tgllahir'];
                    $splitBirthDay = explode("/", $birthDayKontak);
                    if($splitBirthDay[0] == $tanggalSekarang && $splitBirthDay[1] == $bulanSekarang){
                        // simpan ke temp_birhtday
                        $dataInsert['kd_user']  = $rowDataKontak['ID'];
                        $dataInsert['tanggal']  = $tanggalSekarang;
                        $dataInsert['bulan']    = $bulanSekarang;
                        $dataInsert['tahun']    = 0;
                        $insertData = $this->Gmodel->insert($dataInsert, 'temp_birhtday');
                    }
                }
                // save birthday_sent
                $dataInsertSent['tanggal']  =   $tanggalSekarang;
                $dataInsertSent['bulan']    =   $bulanSekarang;
                $dataInsertSent['tahun']    =   $tahunSekarang;
                $insertDataSent = $this->Gmodel->insert($dataInsertSent, 'birthday_sent');
                $this->sentBirthdayMessage();
            }
        }
    }
    function sentBirthdayMessage(){
        $headerMessage = "Pimpinan beserta Sivitas Akademika mengucapkan 'Selamat Ulang Tahun' Semoga Panjang Umur dan Sukses Selalu.";
        $footerMessage = "\nPSI-SMS CENTER";
        $getAllDataToday = $this->Gmodel->get('temp_birhtday');
        if($getAllDataToday->num_rows() > 0){
            foreach ($getAllDataToday->result_array() as $rowDataToday) {
                // get number
                $dataSelectToday['ID'] = $rowDataToday['kd_user'];
                $getDetailNumber = $this->Gmodel->select($dataSelectToday, 'kontak');
                $contentMessage  = $headerMessage;
                // $contentMessage  = $headerMessage." ".$getDetailNumber->row()->name;
                $contentMessage .= $footerMessage;
                $insert = $this->reply($getDetailNumber->row()->number, $contentMessage);
                if($insert){
                    $dataCondition['id'] = $rowDataToday['id'];
                    $deleteT = $this->Gmodel->delete($dataCondition, 'temp_birhtday');
                }
                
            }
        }
    }
}