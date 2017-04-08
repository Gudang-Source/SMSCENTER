<?php
defined('BASEPATH') OR exit('No direct script access allowed');
setlocale(LC_TIME, 'ID_id'); 
setlocale(LC_ALL, 'id_ID');

class Index extends MX_Controller {
    private $inbox;
    private $outbox;
    private $sentitems;
    private $kontak;
    private $grup;
	function __construct() {
        parent::__construct();
        $this->load->model('Gmodel');
        require_once(APPPATH.'modules/inbox/controllers/Inbox.php');   
        require_once(APPPATH.'modules/outbox/controllers/Outbox.php');   
        require_once(APPPATH.'modules/sentitems/controllers/Sentitems.php');   
        require_once(APPPATH.'modules/kontak/controllers/Kontak.php');   
        require_once(APPPATH.'modules/grup/controllers/Grup.php');


        $this->inbox = new Inbox();
        $this->outbox = new Outbox();
        $this->sentitems = new Sentitems();
        $this->kontak = new Kontak();
        $this->grup = new Grup();
        // require_once(APPPATH.'modules/user/controllers/Users.php');
        // $this->isLoggedIn();
        $this->output->delete_cache();
    }
    function isLoggedIn(){
        if($this->session->userdata('loggedin') == false){
            header("location:".base_url('admin/Login'));
        }
    }
    function testInbox(){
        // echo new DateTime($this->inbox->lastInbox()->row()->DeliveryDateTime)->format("H:i:s");
    }
    function index(){

        $data['lastInbox'] = $this->inbox->lastInbox()->num_rows()>0?$this->inbox->lastInbox():'false';
        $data['lastSent'] = $this->sentitems->lastSentItem()->num_rows()>0?$this->sentitems->lastSentItem():'false';
        $data['view'] = 'main_html/content/dashboard';
    	$this->load->view('main_html/content', $data);
    }
    function write_message(){
        // done
        $data['kontak'] = $this->kontak->data();
        $data['grup'] = $this->grup->data();
        $data['view'] = 'main_html/content/write_message';
        $this->load->view('main_html/content', $data);
    }
    function inbox(){
        $data['dataInbox'] = $this->inbox->data();
        $data['view'] = 'main_html/content/inbox';
        $this->load->view('main_html/content', $data);
    }
    function outbox(){
        $data['dataOutbox'] = $this->outbox->data();
        $data['view'] = 'main_html/content/outbox';
        $this->load->view('main_html/content', $data);
    }
    function sent(){
        $data['view'] = 'main_html/content/sent_item';
        $this->load->view('main_html/content', $data);
    }
    function phone_book(){
        $data['kontak'] = $this->kontak->data();
        $data['grup'] = $this->grup->data();
        $data['view'] = 'main_html/content/phone_book';
        $this->load->view('main_html/content', $data);
    }
    function akun(){
        $data['view'] = 'main_html/content/akun';
        $this->load->view('main_html/content', $data);
    }
    function cek_pulsa(){
        $data['view'] = 'main_html/content/cek_pulsa';
        $this->load->view('main_html/content', $data);
    }
    function change_profile(){
        $data['view'] = 'main_html/content/ubah_profile';
        $this->load->view('main_html/content', $data);        
    }
    function grup(){
        $data['view'] = 'main_html/content/grup';
        $this->load->view('main_html/content', $data);
    }
}