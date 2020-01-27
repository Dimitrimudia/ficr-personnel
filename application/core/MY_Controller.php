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
                
//                if($this->session->userdata('user_id'))
//                {
//                    $this->data['user_name'] = $this->session->userdata('Name_12');
//                }
//                elseif($this->location())
//                {
//                    
////                            $segment = $this->uri->segment(1);
////                            if($segment[0] == '@')
////                            {
////                                    redirect('welcome');
////                            }
////                            elseif(in_array($segment, $this->portals) && $this->uri->segment(2) == '' && !isset($_SESSION['account_id'])) 
////                            {
////                                    redirect('page/@'.$segment,'refresh');
////                            }
//                }
//                else
//                {
////                        if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') 
////                        {
////                                /* special ajax here */
////                                echo '<div class="col-md-8">';
////                                echo '<div class="alert alert-danger alert-dismissable">';
////                                echo '     <button type="button" class="close" data-dismiss="alertX" aria-hidden="true">ร</button>';
////                                echo '     <h4><i class="icon fa fa-ban"></i> Alert!</h4>';
////                                echo '     Sorry, your session has expired. Please logout and sign in again.';
////                                echo '</div>';
////                                echo '</div>';
////                                die;
////                        }
////                        else
////                        {
////                                redirect('welcome');
////                        }
//                           redirect('welcome');
//                }
                
                
                
        }
        
        
        public function location()
        {
            
                $segment1 = $this->uri->segment(1);
                $segment2 = $this->uri->segment(2);
                $segment3 = $this->uri->segment(3);
                
                
                if($segment1 == "personnel")
                {
                        return true;
                }
        }
    
}
