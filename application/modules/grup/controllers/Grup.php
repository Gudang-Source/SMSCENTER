<?php
defined('BASEPATH') OR exit('No direct script access allowed');
setlocale(LC_TIME, 'ID_id'); 
setlocale(LC_ALL, 'id_ID');
// $oldLocale = setlocale(LC_TIME, 'id_ID');
// setlocale(LC_TIME, $oldLocale);

class Grup extends MX_Controller {
	function __construct() {
        parent::__construct();
        $this->load->model('Gmodel');
    }
    function data(){
        $data = $this->Gmodel->get('grup');
        return $data;
    }
    function getKontakGrup($id_grup = 0){
        if($id_grup != 0){
            $query = "SELECT kontak.name as nama FROM kontak_grup
                    INNER JOIN grup ON grup.ID = kontak_grup.grup
                    INNER JOIN kontak ON kontak.ID = kontak_grup.kontak
                    WHERE grup.ID = ".$id_grup;
            $getData = $this->Gmodel->rawQuery($query);
            // echo json_encode(array("status"=>1, "list"=>$getData->result_array()));
            return $getData;
        }else{
            // echo json_encode(array("status"=>0));
            return 0;
        }
    }
    function tambahContact(){
        $params = $this->input->post();
        if($params != null){
            $dataInsert['kontak'] = $params['id_kontak'];
            $dataInsert['grup']   = $params['id_grup'];
            $insert = $this->Gmodel->insert($dataInsert, 'kontak_grup');
            if($insert){
                echo json_encode(array("status" => 2));
            }else{
                echo json_encode(array("status" => 1));
            }
        }else{
            echo json_encode(array("status" => 0));
        }
    }
    function tambahGrup(){
        $params = $this->input->post();
        if($params != null){
            $dataInsert['grup'] = $params['namegrup'];
            $insert = $this->Gmodel->insert($dataInsert, 'grup');
            if($insert){
                echo json_encode(array("status" => 2));
            }else{
                echo json_encode(array("status" => 1));
            }
        }else{
            echo json_encode(array("status" => 0));
        }        
    }
    function detail($KODE = null){
        if($KODE != null){
            $dataSelect['sha1(ID)'] = $KODE;
            $selectData = $this->Gmodel->select($dataSelect, 'grup');
            return $selectData;
        }
        return false;
    }
    function delete($KODE = null){
        if($KODE != null){
            $dataSelect['sha1(ID)'] = $KODE;
            $deleteData = $this->Gmodel->delete($dataSelect, 'grup');
            if($deleteData){
                return true;
            }
            return false;
        }
        return false;        
    }
    function add($params = null){
        if($params != null){
            $dataInsert['grup'] = $params['name'];
            $insertData = $this->Gmodel->insert($dataInsert, 'grup');
            if($insertData){
                return 'true';
            }
            return 'false';
        }
        return 'false';
    }
    function add_to_grup($params){
        if($params != null){
            $dataInsert['kontak'] = $params['kontak'];
            $dataInsert['grup'] = $params['grup'];
            $insetData = $this->Gmodel->insert($dataInsert, 'kontak_grup');
            if($insertData){            
                return 'true';
            }
            return 'false';
        }
        return 'false';
    }
    function listbygrup($KODE){
        return $this->Gmodel->rawQuery("SELECT * kontak
                                        INNER JOIN kontak_grup ON kontak.ID = kontak_grup.kontak
                                        WHERE sha1(kontak_grup.grup) = '".$KODE."' ");
    }    
}