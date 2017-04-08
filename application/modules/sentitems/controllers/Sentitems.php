<?php
defined('BASEPATH') OR exit('No direct script access allowed');
setlocale(LC_TIME, 'ID_id'); 
setlocale(LC_ALL, 'id_ID');
// $oldLocale = setlocale(LC_TIME, 'id_ID');
// setlocale(LC_TIME, $oldLocale);

class Sentitems extends MX_Controller {
	function __construct() {
        parent::__construct();
        $this->load->model('Gmodel');
    }
    function data(){
        $data = $this->Gmodel->get('sentitems');
        return $data;
    }
    function detail($KD_INBOX = null){
        if($KD_INBOX != null){
            $dataSelect['sha1(ID)'] = $KD_INBOX;
            $selectData = $this->Gmodel->select($dataSelect, 'sentitems');
            return $selectData;
        }
        return false;
    }
    function delete($KD_INBOX = null){
        if($KD_INBOX != null){
            $dataSelect['sha1(ID)'] = $KD_INBOX;
            $deleteData = $this->Gmodel->delete($dataSelect, 'sentitems');
            if($deleteData){
                return true;
            }
            return false;
        }
        return false;        
    }
    function lastSentItem(){
        $dateNow = date('Y-m-d');
        $data = $this->Gmodel->rawQuery("SELECT * FROM sentitems WHERE DeliveryDateTime BETWEEN '$dateNow  00:00:00' AND '$dateNow 23:59:59' ORDER BY ID");
        return $data;
    }
}