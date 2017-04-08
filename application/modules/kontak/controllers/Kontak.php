<?php
defined('BASEPATH') OR exit('No direct script access allowed');
setlocale(LC_TIME, 'ID_id'); 
setlocale(LC_ALL, 'id_ID');
// $oldLocale = setlocale(LC_TIME, 'id_ID');
// setlocale(LC_TIME, $oldLocale);

class Kontak extends MX_Controller {
	function __construct() {
        parent::__construct();
        $this->load->model('Gmodel');
    }
    function json_getall(){
        $response = array();
        // $searchTerm = $this->input->get();
        $query = $this->Gmodel->rawQuery("SELECT * FROM kontak ORDER BY number ASC");
        foreach ($query->result_array() as $row) {
            $data = array();
            $data['number'] = $row['number'];
            $data['name'] = $row['name'];
            array_push($response, $data);
        }
        echo json_encode($response);
    }
    function json_search($searchTerm = ''){
        $response = array();
        // $searchTerm = $this->input->get();
        $query = $this->Gmodel->rawQuery("SELECT * FROM kontak WHERE number LIKE '%".$searchTerm."%' OR name LIKE '%".$searchTerm."%' ORDER BY number ASC");
        foreach ($query->result_array() as $row) {
            $data = array();
            $data['number'] = $row['number'];
            array_push($response, $data);
        }
        echo json_encode($response);      
    }
    function getNamaKontak($nomor){
        $realnumber = explode("+62", $nomor);
        if(count($realnumber) > 1){        
            $dataSelect['number'] = "0"+$realnumber[1];
            $select = $this->Gmodel->select($dataSelect, 'kontak');
            if($select->num_rows() > 0){
                echo $select->row()->name;
            }else{
                echo $nomor;
            }
        }else{
            $dataSelect['number'] = $nomor;
            $select = $this->Gmodel->select($dataSelect, 'kontak');
            if($select->num_rows() > 0){
                echo $select->row()->name;
            }else{
                echo $nomor;
            }            
        }
    }
    function getKontakGrup($id_grup = 0){
        if($id_grup != 0){
            $query = "SELECT 
                        kontak.name as nama,
                        kontak.ID as ID,
                        kontak_grup.grup as ID_GRUP,
                        grup.grup as NAMA_GRUP
                        FROM kontak_grup
                        INNER JOIN grup ON grup.ID = kontak_grup.grup
                        INNER JOIN kontak ON kontak.ID != kontak_grup.kontak
                        WHERE kontak_grup.grup = ".$id_grup."
                        GROUP BY kontak.ID";
            $getData = $this->Gmodel->rawQuery($query);
            if($getData->num_rows() > 0){

                echo json_encode(array("status"=>1, "id_grup" => $getData->row()->ID_GRUP, "nama_grup" => $getData->row()->NAMA_GRUP, "list"=>$getData->result_array()));
            }else{
                echo json_encode(array("status"=>0));

            }
            // return $getData;            
        }else if($id_grup == 0){
            $query = "SELECT
                        kontak.name as nama,
                        kontak.ID as ID,
                        kontak_grup.grup as ID_GRUP,
                        grup.grup as NAMA_GRUP
                        FROM kontak_grup
                        INNER JOIN grup ON grup.ID = kontak_grup.grup
                        INNER JOIN kontak ON kontak.ID != kontak_grup.kontak
                        GROUP BY kontak.ID";
            $getData = $this->Gmodel->rawQuery($query);
            if($getData->num_rows() > 0){
                echo json_encode(array("status"=>1, "id_grup" => $getData->row()->ID_GRUP, "nama_grup" => $getData->row()->NAMA_GRUP, "list"=>$getData->result_array()));
            }else{
                echo json_encode(array("status"=>0));                
            }
            // return $getData;                        
        }else{
            echo json_encode(array("status" => 0));        
        }
    }
    function data(){
        $data = $this->Gmodel->get('kontak');
        return $data;
    }
    function detail($KD_INBOX = null){
        if($KD_INBOX != null){
            $dataSelect['ID'] = $KD_INBOX;
            $selectData = $this->Gmodel->select($dataSelect, 'kontak');
            echo json_encode(
                    array(
                        "status"    => "1",
                        "id"        => $selectData->row()->ID,
                        "nama"      => $selectData->row()->name,
                        "nomor"     => $selectData->row()->number,
                        "alamat"    => $selectData->row()->alamat,
                        "jabatan"   => $selectData->row()->jabatan,
                        "jurusan"   => $selectData->row()->jurusan,
                        "agama"     => $selectData->row()->agama
                        )
                );
        }else{            
            echo json_encode(array("status"=>"0"));
        }
    }
    function save(){
        $params = $this->input->post();
        $dataInsert['name'] = $params['namecontact'];
        $dataInsert['number'] = $params['numcontact'];
        $dataInsert['jabatan'] = $params['jabatan'];
        $dataInsert['jurusan'] = $params['jurusan'];
        $dataInsert['agama'] = $params['agama'];
        $insertData = $this->Gmodel->insert($dataInsert, 'kontak');
        if($insertData){            
            echo "true";
        }else{
            echo "false";
        }
    }    
    function update(){
        $params = $this->input->post();

        $dataSelect['ID'] = $params['idcontact'];
        $dataInsert['name'] = $params['namecontact'];
        $dataInsert['number'] = $params['numcontact'];
        $dataInsert['alamat'] = $params['alamatcontact'];
        $dataInsert['jabatan'] = $params['jabatancontact'];
        $dataInsert['jurusan'] = $params['jurusancontact'];
        $dataInsert['agama'] = $params['agamacontact'];
        $insertData = $this->Gmodel->update($dataSelect, $dataInsert, 'kontak');
        if($insertData){            
            echo "true";
        }else{
            echo "false";
        }
    }
    function delete(){
        $params = $this->input->post();

        $dataSelect['ID'] = $params['idcontact'];
        $dataInsert['name'] = $params['namecontact'];
        $dataInsert['number'] = $params['numcontact'];
        $dataInsert['alamat'] = $params['alamatcontact'];
        $dataInsert['jabatan'] = $params['jabatancontact'];
        $dataInsert['jurusan'] = $params['jurusancontact'];
        $dataInsert['agama'] = $params['agamacontact'];
        $insertData = $this->Gmodel->delete($dataSelect,'kontak');
        if($insertData){            
            echo "true";
        }else{
            echo "false";
        }
    }
    function add($params = null){
        if($params != null){
            $dataInsert['name'] = $params['namecontact'];
            $dataInsert['number'] = $params['numcontact'];
            $dataInsert['jabatan'] = $params['jabatan'];
            $dataInsert['jurusan'] = $params['jurusan'];
            $dataInsert['agama'] = $params['agama'];
            $insertData = $this->Gmodel->insert($dataInsert, 'kontak');
            if($insertData){            
                return 'true';
            }
            return 'false';
        }
        return 'false';
    }
    function add_to_kontak($params){
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
    function import($type = null, $path = null){

    }
    function listbykontak($KODE){
        return $this->Gmodel->rawQuery("SELECT * grup
                                        INNER JOIN kontak_grup ON grup.ID = kontak_grup.grup
                                        WHERE sha1(kontak_grup.kontak) = '".$KODE."' ");
    }    

}