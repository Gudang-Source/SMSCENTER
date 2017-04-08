<?php
defined('BASEPATH') OR exit('No direct script access allowed');
setlocale(LC_TIME, 'ID_id'); 
setlocale(LC_ALL, 'id_ID');
// $oldLocale = setlocale(LC_TIME, 'id_ID');
// setlocale(LC_TIME, $oldLocale);

class Inbox extends MX_Controller {
	function __construct() {
        parent::__construct();
        $this->load->model('Gmodel');
    }
    function data($type = null){
        if($type==null){            
            $data = $this->Gmodel->get('inbox');
        }else{
            $selectData['Processed'] = 'false';
            $data = $this->Gmodel->select($selectData, 'inbox');
        }
        return $data;
    }
    function detail($KD_INBOX = null){
        if($KD_INBOX != null){
            $dataSelect['sha1(ID)'] = $KD_INBOX;
            $selectData = $this->Gmodel->select($dataSelect, 'inbox');
            return $selectData;
        }
        return false;
    }
    function json_detail($KD_INBOX = null, $type = 'reply'){
        $response = array();
        $response['status'] = 'false';
        if($KD_INBOX != null){
            $dataSelect['sha1(ID)'] = $KD_INBOX;
            $selectData = $this->Gmodel->select($dataSelect, 'inbox');
            if($selectData->num_rows() > 0){
                $item = array();
                if($type == 'reply'){
                    $item['SenderNumber'] = $selectData->row()->SenderNumber;
                }else if ($type == 'forward') {
                    $item['TextDecoded'] = $selectData->row()->TextDecoded;
                }
                $response['status'] = 'true';
                $response['data'] = $item;
            }
        }
        echo json_encode($response);
    }
    function delete($KD_INBOX = null){
        if($KD_INBOX != null){
            $dataSelect['sha1(ID)'] = $KD_INBOX;
            $deleteData = $this->Gmodel->delete($dataSelect, 'inbox');
            if($deleteData){
                return true;
            }
            return false;
        }
        return false;        
    }
    function lastInbox(){
        $dateNow = date('Y-m-d');
        $data = $this->Gmodel->rawQuery("SELECT * FROM inbox WHERE ReceivingDateTime BETWEEN $dateNow AND $dateNow ORDER BY ID");
        return $data;
    }

}