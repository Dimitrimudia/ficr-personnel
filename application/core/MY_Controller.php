<?php
class MY_Controller extends CI_Controller{
    
        public $data = array();
        public function __construct()
        {
                parent::__construct();
                $this->load->helper('url');
                $this->load->helper('form');
                $this->load->library('form_validation');
                $this->load->library('session');
        }
    
}
