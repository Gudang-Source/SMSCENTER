<?php
defined('BASEPATH') OR exit('No direct script access allowed');
setlocale(LC_TIME, 'ID_id'); 
setlocale(LC_ALL, 'id_ID');
// $oldLocale = setlocale(LC_TIME, 'id_ID');
// setlocale(LC_TIME, $oldLocale);

class Outbox extends MX_Controller {
	function __construct() {
        parent::__construct();
        $this->load->model('Gmodel');
    }
    function data(){
        $data = $this->Gmodel->get('sentitems');
        return $data;
    }    
    function sendMessage(){
        $params = $this->input->post();
        if($params != null){
            $result = 'false';
            switch ($params['recipientmsg']) {
                case 1:
                    $result = $this->_sendByKontak($params);
                    break;
                case 2:
                    $result = $this->_sendByGroup($params);
                    break;
                case 3:
                    $result = $this->_sendByNumber($params);
                    break;
                default:
                    $result = $this->_sendByKontak($params);
                    break;
            }
            echo $result;
        }else{
            echo "false";
        }
    }
    function _sendByKontak($params){
        $message = $params['textmsg'];
        foreach ($params['phonemsg'] as $selected_option) {
            $dataInsert['DestinationNumber'] = $selected_option;
            $dataInsert['TextDecoded'] = $message;
            $dataInsert['CreatorID'] = 'Gammu 1.37.0';
            $insertData = $this->Gmodel->insert($dataInsert, 'outbox');
        }
        if($insertData){
            return 'true';
        }else{
            return 'false';
        }
    }
    function _sendByGroup($params){
        $message = $params['textmsg'];
        $grup = $params['selectgrup'];
        $getDataKontak = $this->Gmodel->rawQuery("SELECT * FROM kontak
                                                    INNER JOIN kontak_grup ON kontak_grup.kontak = kontak.ID
                                                    WHERE kontak_grup.grup = '".$grup."'");
        if($getDataKontak->num_rows() > 0){
            foreach ($getDataKontak->result_array() as $row) {
                $dataInsert['DestinationNumber'] = $row['number'];
                $dataInsert['TextDecoded'] = $message;
                $dataInsert['CreatorID'] = 'Gammu 1.37.0';
                $insertData = $this->Gmodel->insert($dataInsert, 'outbox');
            }
            if($insertData){
                return 'true';
            }else{
                return 'false';
            }            
        }else{
            return 'false';
        }
    }
    function _sendByNumber($params){
        $message = $params['textmsg'];
        $phonenumber = $params['numbermsg'];
        $separatednumber = explode(',', $phonenumber);

        if(count($separatednumber) > 1){
            for ($i=0; $i < count($separatednumber); $i++) { 
                $dataInsert['DestinationNumber'] = $separatednumber[$i];
                $dataInsert['TextDecoded'] = $message;
                $dataInsert['CreatorID'] = 'Gammu 1.37.0';
                $insertData = $this->Gmodel->insert($dataInsert, 'outbox');
            }
        }else{
            $dataInsert['DestinationNumber'] = $phonenumber;
            $dataInsert['TextDecoded'] = $message;
            $dataInsert['CreatorID'] = 'Gammu 1.37.0';
            $insertData = $this->Gmodel->insert($dataInsert, 'outbox');
        }
        if($insertData){
            return 'true';
        }else{
            return 'false';
        }
    }
    function detail($KD_INBOX = null){
        if($KD_INBOX != null){
            $dataSelect['sha1(ID)'] = $KD_INBOX;
            $selectData = $this->Gmodel->select($dataSelect, 'outbox');
            return $selectData;
        }
        return false;
    }
    function delete($KD_INBOX = null){
        if($KD_INBOX != null){
            $dataSelect['sha1(ID)'] = $KD_INBOX;
            $deleteData = $this->Gmodel->delete($dataSelect, 'outbox');
            if($deleteData){
                return true;
            }
            return false;
        }
        return false;        
    }
    function testParameter(){
        print_r($this->input->post());
    }
}